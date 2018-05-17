<div id="page">
    <form action=" <?= '/' . ROUTE_ATTENDANCES . '/' . ACTION_CREATE ?>" method="post">

        <div class="material-input">
            <input id="attendanceDate" type="date" name="attendance_date"
                   value="<?= isset($date) ? $date : date('Y-m-d'); ?>" required>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="attendanceDate">Data</label>
            <?php if (isset($error_attendance_invalid_date) && $error_attendance_invalid_date == true) { ?>
                <p class="error"> Podana data jest niewłaściwa! </p>
            <?php } ?>
        </div>

        <div class="material-input">
            <input id="timeIn" type="time" name="attendance_time_in"
                   value="<?= isset($time_in) ? $time_in : '08:00' ?>">
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="timeIn">Czas wejścia</label>
        </div>

        <div class="material-input">
            <input id="timeOut" type="time" name="attendance_time_out"
                   value="<?= isset($time_out) ? $time_out : date('H:i') ?>">
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="timeOut">Czas wyjścia</label>
            <?php if (isset($error_attendance_time) && $error_attendance_time == true
                || isset($error_attendance_duplicate) && $error_attendance_duplicate == true) { ?>
                <p class="error"> Podane godziny są niewłaściwe! </p>
            <?php } ?>
        </div>

        <div class="material-input">
            <input id="attendance_notes" type="text" name="attendance_notes"
                   value="<?= isset($notes) ? $notes : '' ?>"/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="attendance_notes">Notatki</label>
        </div>

        <div class="material-input">
            <input type="submit" name="attendance_add" value="Dodaj">
        </div>
    </form>

</div>
