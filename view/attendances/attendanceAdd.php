<div id="page">
    <h2>Dodaj obecność</h2>
    <br>

    <form action="/attendances/create" method="post">
        <div class="material-input">
            <?php echo "<input type='number' name='year' value= '" . (isset($year) ? $year : '') . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Rok</label>
        </div>

        <div class="material-input">
            <?php echo "<input type='number' name='month' value= '" . (isset($month) ? $month : '') . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Miesiąc</label>
        </div>

        <div class="material-input">
            <?php echo "<input type='number' name='day' value= '" . (isset($day) ? $day : '') . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Dzień</label>
        </div>

        <div class="material-input">
            <?php echo "<input type='number' name='hour_in' value= '" . (isset($hour_in) ? $hour_in : '') . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Godzina wejścia</label>
        </div>

        <div class="material-input">
            <?php echo "<input type='number' name='minute_in' value= '" . (isset($minute_in) ? $minute_in : '') . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Minuta wejścia</label>
        </div>

        <div class="material-input">
            <?php echo "<input type='number' name='hour_in' value= '" . (isset($hour_out) ? $hour_out : '') . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Godzina wyjścia</label>
        </div>

        <div class="material-input">
            <?php echo "<input type='number' name='minute_in' value= '" . (isset($minute_out) ? $minute_out : '') . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Minuta wyjścia</label>
        </div>

        <div class="material-input">
            <?php echo "<input type='text' name='notes' value= '" . (isset($notes) ? $notes : '') . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Notatki</label>
        </div>

        <div class="material-input">
            <input type="submit" name="attendance_add" value="Dodaj">
        </div>
    </form>

</div>
