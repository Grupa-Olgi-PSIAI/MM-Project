<div id="page">
    <h2>Szczegóły faktury nr <?php if (isset($invoice)) {
            echo $invoice->getNumber();
        } ?></h2>
    <br>

    <label for="number">Numer faktury</label>
    <div class="material-input">
        <input type='text' disabled id="number" name='number' <?php if (isset($invoice)) {
            echo "value=" . $invoice->getNumber() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="invoice_date">Data faktury</label>
    <div class="material-input">
        <input type='date' disabled id="invoice_date" name='invoice_date' <?php if (isset($invoice)) {
            echo "value=" . $invoice->getInvoiceDate() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="amount_net">Kwota netto</label>
    <div class="material-input">
        <input type='number' disabled step="0.01" id="amount_net" name='amount_net' <?php if (isset($invoice)) {
            echo "value=" . $invoice->getAmountNet() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="amount_gross">Kwota brutto</label>
    <div class="material-input">
        <input type='number' disabled step="0.01" id="amount_gross" name='amount_gross' <?php if (isset($invoice)) {
            echo "value=" . $invoice->getAmountGross() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="currency">Waluta</label>
    <div class="material-input">
        <input type='text' disabled id="currency" name='currency' value="PLN" <?php if (isset($invoice)) {
            echo "value=" . $invoice->getCurrency() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <div class="material-input">
        <?php if (isset($invoice) && is_numeric($invoice->getFileId())) {
            echo "<a href=\"/invoices/" . $invoice->getFileId() . "/download\" class=\"material-btn\">Pobierz</a>";
        } ?>
    </div>
</div>
