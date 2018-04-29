<div id="page">
    <h2>Dodaj kontrahenta</h2>
    <br>

    <form action="/addcontractor" method="post">
        <div class="material-input">
            <?php echo "<input type='text' name='contractor_name' value= '" . (isset($name) ? $name : '') . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Nazwa</label>
            <?php if (isset($error_contractor_name) && $error_contractor_name == true) echo '<p class="error"> Podaj nazwę! </p>' ?>
        </div>

        <div class="material-input">
            <?php echo "<input type='text' name='contractor_vat_id' value= '" . (isset($vat_id) ? $vat_id : '') . "'/>"; ?>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>VAT ID</label>
            <?php if (isset($error_contractor_vat_id) && $error_contractor_vat_id == true) echo '<p class="error"> Podaj VAT ID! </p>' ?>
            <?php if (isset($error_contractor_vat_id_exists) && $error_contractor_vat_id_exists == true) echo '<p class="error">Kontrahent o takim VAT ID już istnieje</p>' ?>
        </div>

        <div class="material-input">
            <input type="submit" name="contractor_add" value="Wyślij">
        </div>
    </form>

</div>
