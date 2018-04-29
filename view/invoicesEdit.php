<div id="page">
    <h2>Edytuj fakturę <?php if (isset($invoice)) {
            echo $invoice->getNumber();
        } ?></h2>
    <br>

    <form action="/invoices/update?id=<?php if (isset($invoice)) {
        echo $invoice->getId();
    } ?>" method="post">
        <div class="material-input">
            <input type='text' id="number" name='number' <?php if (isset($invoice)) {
                echo "value=" . $invoice->getNumber() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="number">Numer faktury</label>
        </div>

        <div class="material-input">
            <input type='date' id="invoice_date" name='invoice_date' <?php if (isset($invoice)) {
                echo "value=" . $invoice->getInvoiceDate() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="invoice_date">Data faktury</label>
        </div>

        <div class="material-input">
            <input type='number' step="0.01" id="amount_net" name='amount_net' <?php if (isset($invoice)) {
                echo "value=" . $invoice->getAmountNet() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="amount_net">Kwota netto</label>
        </div>

        <div class="material-input">
            <input type='number' step="0.01" id="amount_gross" name='amount_gross' <?php if (isset($invoice)) {
                echo "value=" . $invoice->getAmountGross() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="amount_gross">Kwota brutto</label>
        </div>

        <div class="material-input">
            <input type='text' id="currency" name='currency' value="PLN" <?php if (isset($invoice)) {
                echo "value=" . $invoice->getCurrency() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="currency">Waluta</label>
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
                <input type="submit" name="invoice_edit" value="Wyślij">
            </div>
        <?php } else { ?>
            <a href="/addContractor/show" class="material-btn"> Dodaj nowego kontrahenta </a>
        <?php } ?>
    </form>
</div>
