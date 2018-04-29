<div id="page">
    <h2>Dodaj dokument</h2>
    <br>

    <form action="/documents/create" method="post">
        <div class="material-input">
            <input type='text' name='version' pattern="^([0-9]*)\.([0-9]*)$" title="dwie liczby oddzielone kropką" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Wersja dokumentu</label>
        </div>

        <div class="material-input">
            <input type='text' name='id_internal' pattern="^([0-9]*)$" title="dowolna liczba" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Id wewnątrzne</label>
        </div>

        <div class="material-input">
            <input type='text' name='description' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Opis</label>
        </div>

        <div class="material-input">
            Kontrahent <br>

            <?php if (isset($contractors)) { ?>
                <select name="contractor_id">
                    <?php foreach ($contractors as &$value) {
                        echo "<option value=" . $value->getId() . ">" . $value->getName() . "</option>";
                    } ?>
                </select>
                <br><br><br>
            <?php } else { ?>
                <a href="/addContractor/show" class="material-btn"> Dodaj nowego kontrahenta </a>
            <?php }
            ?>
        </div>
        <div class="material-input">
            <input type="submit" name="invoice_add" value="Wyślij">
        </div>
    </form>

</div>