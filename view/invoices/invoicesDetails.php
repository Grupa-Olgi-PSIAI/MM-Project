<div id="page">
    <?php
    /** @var \model\Invoice $invoice */
    if (!isset($invoice)) {
        throw new RuntimeException("Invoice is missing", 404);
    }
    ?>

    <h2>Szczegóły faktury nr <?= $invoice->getNumber(); ?></h2>
    <br>

    <label for="number">Numer faktury</label>
    <div class="material-input">
        <input type='text' disabled id="number" name='number' value="<?= $invoice->getNumber(); ?>" required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="invoice_date">Data faktury</label>
    <div class="material-input">
        <input type='date' disabled id="invoice_date" name='invoice_date'
               value="<?= $invoice->getInvoiceDate()->format(\util\DateUtils::$PATTERN_DASHED_DATE); ?>" required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="amount_net">Kwota netto</label>
    <div class="material-input">
        <input type='number' disabled step="0.01" id="amount_net" name='amount_net'
               value="<?= $invoice->getAmountNet(); ?>" required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="amount_gross">Kwota brutto</label>
    <div class="material-input">
        <input type='number' disabled step="0.01" id="amount_gross" name='amount_gross'
               value="<?= $invoice->getAmountGross(); ?>" required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="currency">Waluta</label>
    <div class="material-input">
        <input type='text' disabled id="currency" name='currency' value="<?= $invoice->getCurrency(); ?>" required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <div class="material-input">
        <?php if (isset($invoice) && is_numeric($invoice->getFileId())) { ?>
            <a href="/invoices/<?= $invoice->getFileId(); ?>/download" class="material-btn">Pobierz</a>
        <?php } ?>
    </div>
</div>
