<?php

namespace controller;


use core\Controller;
use core\View;
use model\Attendance;
use util\AuthFlags;

class Attendances extends Controller
{
    private const RESOURCE_ATTENDANCE = "attendance";

    public function showAction()
    {
        $this->checkPermissions(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_CREATE);
        View::render('attendances/attendanceAdd.php');
    }

    public function createAction()
    {
        $this->checkPermissions(self::RESOURCE_ATTENDANCE, AuthFlags::OWN_CREATE);

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

        $error_attendance_dates = ( ($hour_in > $hour_out) || (($hour_in == $hour_out) && ($minute_in >= $minute_out)) );
        $error_attendance_duplicate = false;

        $repository = new AttendanceRepository();

        //TODO: check for $error_attendance_duplicate
        $time_in = 0;
        $time_out = 0;

        if (!$error_attendance_dates &&
            !$error_attendance_duplicate) {

            $attendance = new Attendance();
            $attendance->setVersion(1);
            $attendance->setTimeIn($time_in);
            $attendance->setTimeOut($time_out);
            $attendance->setNotes($notes);

            $repository->add($attendance);

            $this->showAction();
            return;
        }

        View::render('contractors/contractorsAdd.php', [
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

}
