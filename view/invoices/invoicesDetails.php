<div id="page">
    <?php
    /** @var \model\InvoiceView $invoice */
    if (!isset($invoice)) {
        throw new RuntimeException("Invoice is missing", 404);
    }
    ?>

    <table cellpadding="0" cellspacing="0" border="0" class="tbl-details">
        <tbody>
        <tr>
            <td>Numer faktury:</td>
            <td><?= $invoice->getNumber(); ?></td>
        </tr>
        <tr>
            <td>Data wystawienia faktury:</td>
            <td><?= $invoice->getInvoiceDate(); ?></td>
        </tr>
        <tr>
            <td>Data dodania faktury:</td>
            <td><?= $invoice->getDateCreated(); ?></td>
        </tr>
        <tr>
            <td>Kwota netto:</td>
            <td><?= $invoice->getAmountNet(); ?></td>
        </tr>
        <tr>
            <td>Kwota brutto:</td>
            <td><?= $invoice->getAmountGross(); ?></td>
        </tr>
        <tr>
            <td>Podatek:</td>
            <td><?= $invoice->getAmountTax(); ?></td>
        </tr>
        <tr>
            <td>Waluta:</td>
            <td><?= $invoice->getCurrency(); ?></td>
        </tr>
        <tr>
            <td>Kwota netto w walucie:</td>
            <td><?= $invoice->getAmountNetCurrency(); ?></td>
        </tr>
        <tr>
            <td>Kontrahent:</td>
            <td><?= $invoice->getContractor(); ?></td>
            <td><a href="<?= '/' . ROUTE_CONTRACTORS . '/' . $invoice->getContractorId() . '/' . ACTION_DETAILS ?>"
                   class="material-btn">Szczegóły</a>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="material-input">
        <?php if (is_numeric($invoice->getFileId())) { ?>
            <a href="<?= '/' . ROUTE_INVOICES . '/' . $invoice->getFileId() . '/' . ACTION_DOWNLOAD ?>"
               class="material-btn">Pobierz</a>
        <?php } ?>
    </div>
</div>
