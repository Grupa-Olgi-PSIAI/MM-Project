<?php

namespace controller;

use core\Controller;
use core\View;
use model\Attendance;
use model\AttendanceView;
use model\User;
use repository\AttendanceRepository;
use repository\UserRepository;
use util\AuthFlags;
use util\Authorization;
use util\DateUtils;
use util\Redirect;
use util\Session;

class Attendances extends Controller
{
    private const RESOURCE_ATTENDANCE = "attendance";

    /**
     * @var AttendanceRepository
     */
    private $attendanceRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;
    private $auth;
    private $userId;

    public function __construct(array $route_params)
    {
        parent::__construct($route_params);
        $this->attendanceRepository = new AttendanceRepository();
        $this->userRepository = new UserRepository();
        $this->auth = Authorization::getInstance();
        $this->userId = Session::getInstance()->get(Session::USER_SESSION);
    }

    public function showAction()
    {

        if ($this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::GROUP_READ)) {
            $attendances = $this->attendanceRepository->findAll();
            $users = true;
        } else if ($this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_READ)) {
            $attendances = $this->attendanceRepository->findByUserId($this->userId);
            $users = false;
        };

        $can_add = $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_CREATE)
            || $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::GROUP_CREATE);
        $can_update = $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_UPDATE)
            || $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::GROUP_UPDATE);
        $can_delete = $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_DELETE)
            || $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::GROUP_DELETE);

        if ($can_add) {
            $addPath = '/' . ROUTE_ATTENDANCES . '/' . ACTION_ADD;
        }

        if (isset($attendances)) {
            $attendancesView = [];
            foreach ($attendances as $attendance) {
                $attendancesView[] = $this->mapToView($attendance);
            }
        }

        View::render('attendances/attendanceList.php',
            ["title" => "Godziny pracy",
                "attendances" => $attendancesView,
                "can_add" => $can_add,
                "can_update" => $can_update,
                "can_delete" => $can_delete,
                "add" => $addPath,
                "users" => $users,
                "search" => '/' . ROUTE_ATTENDANCES . '/' . ACTION_SEARCH]);
    }

    public function addAction()
    {
        $this->checkPermissions(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_CREATE);

        View::render('attendances/attendanceAdd.php', ["title" => "Zaloguj godziny pracy"]);
    }

    public function createAction()
    {
        $this->checkPermissions(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_CREATE);

        unset($error_attendance_invalid_date);
        unset($error_attendance_duplicate);
        unset($error_attendance_time);

        $date = $_POST['attendance_date'];
        $time_in = $_POST['attendance_time_in'];
        $time_out = $_POST['attendance_time_out'];
        $notes = $_POST['attendance_notes'];

        $dateIn = \DateTime::createFromFormat('Y-m-d H:i', $date . ' ' . $time_in);
        $dateOut = \DateTime::createFromFormat('Y-m-d H:i', $date . ' ' . $time_out);

        $error_attendance_invalid_date = !($dateIn && $dateOut);
        $error_attendance_time = ($dateIn > $dateOut);
        $error_attendance_duplicate = $dateIn == $dateOut;

        if (!$error_attendance_invalid_date &&
            !$error_attendance_time &&
            !$error_attendance_duplicate) {

            $attendance = new Attendance();
            $attendance->setVersion(1);
            $attendance->setUserId($this->userId);
            $attendance->setTimeIn($dateIn->format(DateUtils::$PATTERN_MYSQL_DATE_TIME));
            $attendance->setTimeOut($dateOut->format(DateUtils::$PATTERN_MYSQL_DATE_TIME));
            $attendance->setNotes($notes);

            $this->attendanceRepository->add($attendance);

            Redirect::to('/' . ROUTE_ATTENDANCES . '/' . ACTION_SHOW);
        }

        View::render('attendances/attendanceAdd.php', [
            "title" => "Zaloguj godziny pracy",
            "error_attendance_invalid_date" => $error_attendance_invalid_date,
            "error_attendance_duplicate" => $error_attendance_duplicate,
            "error_attendance_time" => $error_attendance_time,
            "date" => $date,
            "time_in" => $time_in,
            "time_out" => $time_out,
            "notes" => $notes
        ]);
    }

    public function deleteAction()
    {
        $this->checkPermissions(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_DELETE);
        $id = $this->route_params['id'];
        $this->attendanceRepository->delete($id);

        Redirect::to('/' . ROUTE_ATTENDANCES . '/' . ACTION_SHOW);
    }

    public function editAction()
    {
        $this->checkPermissions(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_UPDATE);
        $id = $this->route_params['id'];
        $attendance = $this->attendanceRepository->findById($id);
        $attendanceView = $this->mapToView($attendance);

        View::render('attendances/attendanceEdit.php', ["title" => "Edytuj godziny pracy",
            "attendance" => $attendanceView]);
    }

    public function updateAction()
    {
        $this->checkPermissions(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_UPDATE);
        $id = $this->route_params['id'];

        /** @var Attendance $attendance */
        $attendance = $this->attendanceRepository->findById($id);

        unset($error_attendance_invalid_date);
        unset($error_attendance_duplicate);
        unset($error_attendance_time);

        $date = $_POST['attendance_date'];
        $time_in = $_POST['attendance_time_in'];
        $time_out = $_POST['attendance_time_out'];
        $notes = $_POST['attendance_notes'];

        $dateIn = \DateTime::createFromFormat('Y-m-d H:i', $date . ' ' . $time_in);
        $dateOut = \DateTime::createFromFormat('Y-m-d H:i', $date . ' ' . $time_out);

        $error_attendance_invalid_date = !($dateIn && $dateOut);
        $error_attendance_time = ($dateIn > $dateOut);
        $error_attendance_duplicate = $dateIn == $dateOut;

        $updated = new Attendance();
        $updated->setVersion(1);
        $updated->setUserId($attendance->getUserId());
        $updated->setTimeIn($dateIn->format(DateUtils::$PATTERN_MYSQL_DATE_TIME));
        $updated->setTimeOut($dateOut->format(DateUtils::$PATTERN_MYSQL_DATE_TIME));
        $updated->setNotes($notes);

        if (!$error_attendance_invalid_date &&
            !$error_attendance_time &&
            !$error_attendance_duplicate) {

            $this->attendanceRepository->update($id, $updated);
            Redirect::to('/' . ROUTE_ATTENDANCES . '/' . ACTION_SHOW);
        }

        $updatedView = $this->mapToView($updated);

        View::render('attendances/attendanceEdit.php', [
            "title" => "Edytuj godziny pracy",
            "error_attendance_invalid_date" => $error_attendance_invalid_date,
            "error_attendance_duplicate" => $error_attendance_duplicate,
            "error_attendance_time" => $error_attendance_time,
            "attendance" => $updatedView
        ]);
    }

    private function mapToView(Attendance $attendance): AttendanceView
    {
        /** @var User $user */
        $user = $this->userRepository->findById($attendance->getUserId());
        $workTime = $attendance->getTimeIn()->diff($attendance->getTimeOut());
        $attendanceView = new AttendanceView();
        $attendanceView->setId($attendance->getId())
            ->setNotes($attendance->getNotes())
            ->setUserName($user->getFirstName() . ' ' . $user->getLastName())
            ->setTimeIn($attendance->getTimeIn()->format(DateUtils::$PATTERN_SHORT_TIME))
            ->setDateIn($attendance->getTimeIn()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setDateOut($attendance->getTimeOut()->format(DateUtils::$PATTERN_DASHED_DATE))
            ->setTimeOut($attendance->getTimeOut()->format(DateUtils::$PATTERN_SHORT_TIME))
            ->setWorkTime($workTime);

        return $attendanceView;
    }

    public function searchAction()
    {
        $this->checkPermissions(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_READ);

        $criterium = $_POST['criterium'];
        $id = $this->userId;
        if ($this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::GROUP_READ)) {
            $con = array('notes LIKE ?', 'user_id IN (SELECT id FROM users WHERE last_name = ?)');
        } else if ($this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_READ)) {
            $con = array('notes LIKE ? AND user_id = ' . $id . ' ', 'user_id IN (SELECT id FROM users WHERE last_name = ?) AND user_id = ' . $id . ' ');
        }

        $val = array("%" . $criterium . "%", $criterium);

        $attendances = $this->attendanceRepository->findOr($con, $val);

        $can_add = $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_CREATE)
            || $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::GROUP_CREATE);
        $can_update = $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_UPDATE)
            || $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::GROUP_UPDATE);
        $can_delete = $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_DELETE)
            || $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::GROUP_DELETE);

        $attendancesView = [];
        foreach ($attendances as $attendance) {
            $attendancesView[] = $this->mapToView($attendance);
        }

        if ($can_add) {
            $addPath = '/' . ROUTE_ATTENDANCES . '/' . ACTION_ADD;
            View::render('attendances/attendanceList.php',
                ["title" => "Godziny pracy",
                    "attendances" => $attendancesView,
                    "can_add" => $can_add,
                    "can_update" => $can_update,
                    "can_delete" => $can_delete,
                    "add" => $addPath,
                    "search" => '/' . ROUTE_ATTENDANCES . '/' . ACTION_SEARCH]);
        } else {
            View::render('attendances/attendanceList.php',
                ["title" => "Godziny pracy",
                    "attendances" => $attendancesView,
                    "can_add" => $can_add,
                    "can_update" => $can_update,
                    "can_delete" => $can_delete,
                    "search" => '/' . ROUTE_ATTENDANCES . '/' . ACTION_SEARCH]);
        }
    }
}
