<?php

namespace controller;

use core\Controller;
use core\View;
use model\Attendance;
use repository\AttendanceRepository;
use util\AuthFlags;
use util\Authorization;
use util\Redirect;
use util\Session;

class Attendances extends Controller
{
    private const RESOURCE_ATTENDANCE = "attendance";

    private $attendanceRepository;
    private $auth;
    private $userId;

    public function __construct(array $route_params)
    {
        parent::__construct($route_params);
        $this->attendanceRepository = new AttendanceRepository();
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

        $can_add = $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_CREATE) || $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::GROUP_CREATE);
        $can_update = $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_UPDATE) || $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::GROUP_UPDATE);
        $can_delete = $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_DELETE) || $this->auth->hasPermission(self::RESOURCE_ATTENDANCE, AuthFlags::GROUP_DELETE);

        View::render('attendances/attendanceList.php',
            ["title" => "Godziny pracy",
                "attendances" => $attendances,
                "can_add" => $can_add,
                "can_update" => $can_update,
                "can_delete" => $can_delete,
                "users" => $users]);
    }

    public function addAction()
    {
        $this->checkPermissions(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_CREATE);

        View::render('attendances/attendanceAdd.php', ["title" => "Zaloguj godziny pracy"]);
    }

    public function createAction()
    {
        $this->checkPermissions(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_CREATE);

        unset($error_attendance_invalid_month_day);
        unset($error_attendance_duplicate);
        unset($error_attendance_dates);

        $year = $_POST['attendance_year'];
        $month = $_POST['attendance_month'];
        $day = $_POST['attendance_day'];

        $hour_in = $_POST['attendance_hour_in'];
        $minute_in = $_POST['attendance_minute_in'];

        $hour_out = $_POST['attendance_hour_out'];
        $minute_out = $_POST['attendance_minute_out'];

        $notes = $_POST['attendance_notes'];

        $error_attendance_invalid_month_day = !checkdate($month, $day, $year);
        $error_attendance_dates = (($hour_in > $hour_out) || (($hour_in == $hour_out) && ($minute_in >= $minute_out)));

        $repository = new AttendanceRepository();


        //TODO: check for $error_attendance_duplicate
        $time_in = $year . "-" . $month . "-" . $day . " " . $hour_in . ":" . $minute_in . ":00";
        $time_out = $year . "-" . $month . "-" . $day . " " . $hour_out . ":" . $minute_out . ":00";

        $error_attendance_duplicate = false;

        if (!$error_attendance_invalid_month_day &&
            !$error_attendance_dates &&
            !$error_attendance_duplicate) {

            $attendance = new Attendance();
            $attendance->setVersion(1);
            $attendance->setUserId($this->userId);
            $attendance->setTimeIn($time_in);
            $attendance->setTimeOut($time_out);
            $attendance->setNotes($notes);

            $repository->add($attendance);

            Redirect::to('/' . ROUTE_ATTENDANCES . '/' . ACTION_SHOW);
        }

        View::render('attendances/attendanceAdd.php', [
            "title" => "Zaloguj godziny pracy",
            "error_attendance_invalid_month_day" => $error_attendance_invalid_month_day,
            "error_attendance_duplicate" => $error_attendance_duplicate,
            "error_attendance_dates" => $error_attendance_dates,
            "year" => $year,
            "month" => $month,
            "day" => $day,
            "hour_in" => $hour_in,
            "minute_in" => $minute_in,
            "hour_out" => $hour_out,
            "minute_out" => $minute_out,
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

        View::render('attendances/attendanceEdit.php', ["title" => "Edytuj godziny pracy",
            "attendance" => $attendance]);
    }

    public function updateAction() {
        $this->checkPermissions(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_UPDATE);
        $id = $this->route_params['id'];
        $attendance = $this->attendanceRepository->findById($id);

        unset($error_attendance_invalid_month_day);
        unset($error_attendance_duplicate);
        unset($error_attendance_dates);

        $year = $_POST['attendance_year'];
        $month = $_POST['attendance_month'];
        $day = $_POST['attendance_day'];

        $hour_in = $_POST['attendance_hour_in'];
        $minute_in = $_POST['attendance_minute_in'];

        $hour_out = $_POST['attendance_hour_out'];
        $minute_out = $_POST['attendance_minute_out'];

        $notes = $_POST['attendance_notes'];

        $error_attendance_invalid_month_day = !checkdate($month, $day, $year);
        $error_attendance_dates = (($hour_in > $hour_out) || (($hour_in == $hour_out) && ($minute_in >= $minute_out)));

        $repository = new AttendanceRepository();

        //TODO: check for $error_attendance_duplicate
        $time_in = $year . "-" . $month . "-" . $day . " " . $hour_in . ":" . $minute_in . ":00";
        $time_out = $year . "-" . $month . "-" . $day . " " . $hour_out . ":" . $minute_out . ":00";

        $error_attendance_duplicate = false;

        $updated = $attendance;
        $updated->setTimeIn($time_in);
        $updated->setTimeOut($time_out);
        $updated->setNotes($notes);

        if (!$error_attendance_invalid_month_day &&
            !$error_attendance_dates &&
            !$error_attendance_duplicate) {

            $repository->update($attendance->getId(), $attendance);
            Redirect::to('/' . ROUTE_ATTENDANCES . '/' . ACTION_SHOW);
        }

        View::render('attendances/attendanceEdit.php', ["title" => "Edytuj godziny pracy",
            "error_attendance_invalid_month_day" => $error_attendance_invalid_month_day,
            "error_attendance_duplicate" => $error_attendance_duplicate,
            "error_attendance_dates" => $error_attendance_dates,
            "attendance" => $updated]);
    }
}
