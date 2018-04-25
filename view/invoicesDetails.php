<div id="page">
    <h2>Szczegóły faktury nr <?php if (isset($invoice)) {
            echo $invoice->getNumber();
        } ?></h2>
    <br>

    <label>Numer faktury</label>
    <div class="material-input">
        <input type='text' disabled name='number' <?php if (isset($invoice)) {
            echo "value=" . $invoice->getNumber() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label>Data faktury</label>
    <div class="material-input">
        <input type='date' disabled name='invoice_date' <?php if (isset($invoice)) {
            echo "value=" . $invoice->getInvoiceDate() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label>Kwota netto</label>
    <div class="material-input">
        <input type='number' disabled step="0.01" name='amount_net' <?php if (isset($invoice)) {
            echo "value=" . $invoice->getAmountNet() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label>Kwota brutto</label>
    <div class="material-input">
        <input type='number' disabled step="0.01" name='amount_gross' <?php if (isset($invoice)) {
            echo "value=" . $invoice->getAmountGross() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label>Waluta</label>
    <div class="material-input">
        <input type='text' disabled name='currency' value="PLN" <?php if (isset($invoice)) {
            echo "value=" . $invoice->getCurrency() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>
</div>