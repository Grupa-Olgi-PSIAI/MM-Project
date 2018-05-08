<div id="page">
    <a id="filter_popup" href="#" class="popup"></a>
    <div class="popup">
        <form title="filter" action="/invoices/filter" method="post">
            <div class="row">
                <div class="material-input">
                    <input type="date" name='dateFrom' title="filter"/>
                    <input type="date" name='dateTo' title="filter"/>
                </div>
                <div class="material-input">
                    <input type="submit"/>
                </div>
            </div>

        </form>
        <a class="close x" href="#">x</a>
    </div>

    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Numer</th>
                <th>Data</th>
                <th>Kwota netto</th>
                <th>Kwota brutto</th>
                <th>Waluta</th>
                <th>Kontrahent</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
            /** @var \model\InvoiceView $invoice */
            if (isset($invoices)) {
                foreach ($invoices as $invoice) { ?>
                    <tr>
                        <td><?= $invoice->getNumber(); ?></td>
                        <td><?= $invoice->getInvoiceDate(); ?></td>
                        <td><?= $invoice->getAmountNet(); ?></td>
                        <td><?= $invoice->getAmountGross(); ?></td>
                        <td><?= $invoice->getCurrency(); ?></td>
                        <td><?= $invoice->getContractor(); ?></td>
                        <td><a href="/invoices/<?= $invoice->getId(); ?>/details" class="material-btn">Szczegóły</a>
                        </td>
                        <td><a href="/invoices/<?= $invoice->getId(); ?>/edit" class="material-btn">Edytuj</a></td>
                        <td><a href="/invoices/<?= $invoice->getId(); ?>/delete" class="material-btn">Usuń</a></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
    </div>
    <div class="tbl-summary">
        <?php $summary = 0;
        if (isset($invoices)) {
            foreach ($invoices as $invoice) {
                $summary += $invoice->getAmountGross();
            } ?>
            <p>Suma brutto: <?= $summary; ?></p>
        <?php } ?>
    </div>

</div>
