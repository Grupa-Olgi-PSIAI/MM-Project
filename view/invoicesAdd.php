<div id="page">
    <h2>Dodaj fakturę</h2>
    <br>

    <form action="/invoices/create" method="post">
        <div class="material-input">
            <input type='text' name='number' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Numer faktury</label>
        </div>

        <div class="material-input">
            <input type='date' name='invoice_date' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Data faktury</label>
        </div>

        <div class="material-input">
            <input type='number' step="0.01" name='amount_net' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Kwota netto</label>
        </div>

        <div class="material-input">
            <input type='number' step="0.01" name='amount_gross' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Kwota brutto</label>
        </div>

        <div class="material-input">
            <input type='text' name='currency' value="PLN" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Waluta</label>
        </div>

        Kontrahent <br>

        <?php if (isset($contractors)) { ?>
            <select name="contractor_id">
                <?php foreach ($contractors as &$value) {
                    echo "<option value=" . $value->getId() . ">" . $value->getName() . "</option>";
                } ?>
            </select>
            <br><br><br>
            <div class="material-input">
                <input type="submit" name="invoice_add" value="Wyślij">
            </div>
        <?php } else { ?>
            <a href="/addContractor/show" class="material-btn"> Dodaj nowego kontrahenta </a>
        <?php }
        ?>
    </form>
</div>
