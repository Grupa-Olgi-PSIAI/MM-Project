<div id="page">
    <h2>Dodaj obecność</h2>
    <br>

    <form action=" <?= '/' . ROUTE_ATTENDANCES . '/' . ACTION_CREATE ?>" method="post">
        <div class="material-input">
            <?php echo "<input type='number' name='attendance_year' min='1990' max='" . date('Y') . "'value= '" . (isset($year) ? $year : date('Y')) . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Rok</label>
        </div>

        <div class="material-input">
            <?php echo "<input type='number' name='attendance_month' min='1' max='12' value= '" . (isset($month) ? $month : date('m')) . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Miesiąc</label>
        </div>

        <div class="material-input">
            <?php echo "<input type='number' name='attendance_day' min='1' max='31' value= '" . (isset($day) ? $day : date('d')) . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Dzień</label>
            <?php if (isset($error_attendance_invalid_month_day) && $error_attendance_invalid_month_day == true) echo '<p class="error"> Podana data jest niewłaściwa! </p>' ?>
        </div>


        <div class="material-input">
            <?php echo "<input type='number' name='attendance_hour_in'  min='0' max='23' value= '" . (isset($hour_in) ? $hour_in : 8) . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Godzina wejścia</label>
        </div>

        <div class="material-input">
            <?php echo "<input type='number' name='attendance_minute_in'  min='0' max='59' value= '" . (isset($minute_in) ? $minute_in : 0) . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Minuta wejścia</label>
        </div>

        <div class="material-input">
            <?php echo "<input type='number' name='attendance_hour_out'  min='0' max='23' value= '" . (isset($hour_out) ? $hour_out : 16) . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Godzina wyjścia</label>
        </div>

        <div class="material-input">
            <?php echo "<input type='number' name='attendance_minute_out' min='0' max='59' value= '" . (isset($minute_out) ? $minute_out : 0) . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Minuta wyjścia</label>
            <?php if (isset($error_attendance_dates) && $error_attendance_dates == true) echo '<p class="error"> Podane godziny są niewłaściwe! </p>' ?>
        </div>



        <div class="material-input">
            <?php echo "<input type='text' name='attendance_notes' value= '" . (isset($notes) ? $notes : '') . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Notatki</label>
        </div>

        <div class="material-input">
            <input type="submit" name="attendance_add" value="Dodaj">
        </div>
    </form>

</div>
