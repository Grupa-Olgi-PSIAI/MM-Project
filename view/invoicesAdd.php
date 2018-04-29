<div id="page">
    <h2>Dodaj fakturę</h2>
    <br>

    <form action="/invoices/create" method="post" enctype="multipart/form-data">
        <div class="material-input">
            <input type='text' id="number" name='number' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="number">Numer faktury</label>
        </div>

        <div class="material-input">
            <input type='text' id="invoice_date" name='invoice_date' onfocus="(this.type='date')"
                   onblur="(this.type='text')" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="invoice_date">Data faktury</label>
        </div>

        <div class="material-input">
            <input type='number' id="amount_net" step="0.01" name='amount_net' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="amount_net">Kwota netto</label>
        </div>

        <div class="material-input">
            <input type='number' id="amount_gross" step="0.01" name='amount_gross' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="amount_gross">Kwota brutto</label>
        </div>

        <div class="material-input">
            <input type='text' id="currency" name='currency' value="PLN" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="currency">Waluta</label>
        </div>

        <div class="material-input">
            <input type='file' id="file" name='file'/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="file">Plik</label>
        </div>

        <?php if (isset($contractors)) { ?>
            <label for="contractor_id">Kontrahent<br></label>
            <select id="contractor_id" name="contractor_id">
                <?php /** @var \model\Contractor $value */
                foreach ($contractors as &$value) {
                    echo "<option value=" . $value->getId() . ">" . $value->getName() . "</option>";
                } ?>
            </select>
            <br><br><br>
            <div class="material-input">
                <input type="submit" name="invoice_add" value="Wyślij">
            </div>
        <?php } else { ?>
            <a href="/addContractor/show" class="material-btn"> Dodaj nowego kontrahenta </a>
        <?php } ?>
    </form>
</div>
