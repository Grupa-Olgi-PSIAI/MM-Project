<div id="page">
    <h2>Edytuj obecność</h2>
    <br>

    <?php if (!isset($attendance)) {
        echo "Nie znaleziono";
    } else { ?>

        <form action=" <?='/' . ROUTE_ATTENDANCES . '/' . $attendance->getId() . '/' . ACTION_UPDATE ?>" method="post">
            <div class="material-input">
                <?php echo "<input type='number' name='attendance_year' min='1990' max='" . date('Y') . "'value= '" . \util\DateUtils::getYear($attendance->getTimeIn()) . "'/>"; ?>
                <span class="material-input-highlight"></span>
                <span class="material-input-bar"></span>
                <label>Rok</label>
            </div>

            <div class="material-input">
                <?php echo "<input type='number' name='attendance_month' min='1' max='12' value= '" . \util\DateUtils::getMonth($attendance->getTimeIn()) . "'/>"; ?>
                <span class="material-input-highlight"></span>
                <span class="material-input-bar"></span>
                <label>Miesiąc</label>
            </div>

            <div class="material-input">
                <?php echo "<input type='number' name='attendance_day' min='1' max='31' value= '" . \util\DateUtils::getDay($attendance->getTimeIn()) . "'/>"; ?>
                <span class="material-input-highlight"></span>
                <span class="material-input-bar"></span>
                <label>Dzień</label>
                <?php if (isset($error_attendance_invalid_month_day) && $error_attendance_invalid_month_day == true) echo '<p class="error"> Podana data jest niewłaściwa! </p>' ?>
            </div>


            <div class="material-input">
                <?php echo "<input type='number' name='attendance_hour_in'  min='0' max='23' value= '" . \util\DateUtils::getHour($attendance->getTimeIn()) . "'/>"; ?>
                <span class="material-input-highlight"></span>
                <span class="material-input-bar"></span>
                <label>Godzina wejścia</label>
            </div>

            <div class="material-input">
                <?php echo "<input type='number' name='attendance_minute_in'  min='0' max='59' value= '" . \util\DateUtils::getMinute($attendance->getTimeIn()) . "'/>"; ?>
                <span class="material-input-highlight"></span>
                <span class="material-input-bar"></span>
                <label>Minuta wejścia</label>
            </div>

            <div class="material-input">
                <?php echo "<input type='number' name='attendance_hour_out'  min='0' max='23' value= '" . \util\DateUtils::getHour($attendance->getTimeOut()) . "'/>"; ?>
                <span class="material-input-highlight"></span>
                <span class="material-input-bar"></span>
                <label>Godzina wyjścia</label>
            </div>

            <div class="material-input">
                <?php echo "<input type='number' name='attendance_minute_out' min='0' max='59' value= '" . \util\DateUtils::getMinute($attendance->getTimeOut()) . "'/>"; ?>
                <span class="material-input-highlight"></span>
                <span class="material-input-bar"></span>
                <label>Minuta wyjścia</label>
                <?php if (isset($error_attendance_dates) && $error_attendance_dates == true) echo '<p class="error"> Podane godziny są niewłaściwe! </p>' ?>
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

    <?php } ?>

</div>
