<?php

use util\DateUtils;

?>

<div id="page">

    <ul id="content-nav">
        <li><a href="/invoices/add" class="material-btn">Nowa</a></li>
        <li><a href="#filter_popup" class="material-btn">Filtruj</a></li>
        <li>
            <form class="search-bar" action="/invoices/search" method="post">
                <input type="search" placeholder="Szukaj faktury..." name="criterium">
            </form>
        </li>
    </ul>

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

    <br>
    <h2>Lista faktur</h2>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Numer</th>
                <th>Data</th>
                <th>Kwota netto</th>
                <th>Kwota brutto</th>
                <th>Podatek</th>
                <th>Waluta</th>
                <th>Kwota netto w walucie</th>
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
            /** @var \model\Invoice $invoice */
            if (isset($invoices)) {
                foreach ($invoices as $invoice) { ?>
                    <tr>
                        <td><?= $invoice->getNumber(); ?></td>
                        <td><?= $invoice->getInvoiceDate()->format(DateUtils::$PATTERN_PLAIN_DATE); ?></td>
                        <td><?= $invoice->getAmountNet(); ?></td>
                        <td><?= $invoice->getAmountGross(); ?></td>
                        <td><?= $invoice->getAmountTax(); ?></td>
                        <td><?= $invoice->getCurrency(); ?></td>
                        <td><?= $invoice->getAmountNetCurrency(); ?></td>
                        <td><?= $invoice->getContractorId(); ?></td>
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
