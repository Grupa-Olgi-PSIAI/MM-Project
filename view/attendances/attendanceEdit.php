<div id="page">
    <?php /** @var \model\AttendanceView $attendance */
    if (!isset($attendance)) {
        throw new RuntimeException("Not found", 404);
    } ?>

    <form action=" <?= '/' . ROUTE_ATTENDANCES . '/' . $attendance->getId() . '/' . ACTION_UPDATE ?>" method="post">

        <div class="material-input">
            <input id="attendanceDate" type="date" name="attendance_date"
                   value="<?= $attendance->getDateIn(); ?>" required>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="attendanceDate">Data</label>
            <?php if (isset($error_attendance_invalid_date) && $error_attendance_invalid_date == true) { ?>
                <p class="error"> Podana data jest niewłaściwa! </p>
            <?php } ?>
        </div>

        <div class="material-input">
            <input id="timeIn" type="time" name="attendance_time_in"
                   value="<?= $attendance->getTimeIn(); ?>">
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="timeIn">Czas wejścia</label>
        </div>

        <div class="material-input">
            <input id="timeOut" type="time" name="attendance_time_out"
                   value="<?= $attendance->getTimeOut() ?>">
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="timeOut">Czas wyjścia</label>
            <?php if (isset($error_attendance_time) && $error_attendance_time == true
                || isset($error_attendance_duplicate) && $error_attendance_duplicate == true) { ?>
                <p class="error"> Podane godziny są niewłaściwe! </p>
            <?php } ?>
        </div>

        <div class="material-input">
            <?php echo "<input type='text' name='attendance_notes' value= '" . $attendance->getNotes() . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Notatki</label>
        </div>

        <div class="material-input">
            <input type="submit" name="attendance_edit" value="Zapisz">
        </div>
    </form>
</div>
