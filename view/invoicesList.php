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
                foreach ($invoices
                         as $key => $invoice) { ?>
                    <tr>
                        <td><?php echo $invoice->getNumber() ?></td>
                        <td><?php DateUtils::getPlainDate($invoice->getInvoiceDate()) ?></td>
                        <td><?php echo $invoice->getAmountNet() ?></td>
                        <td><?php echo $invoice->getAmountGross() ?></td>
                        <td><?php echo $invoice->getAmountTax() ?></td>
                        <td><?php echo $invoice->getCurrency() ?></td>
                        <td><?php echo $invoice->getAmountNetCurrency() ?></td>
                        <td><?php echo $invoice->getContractorId() ?></td>
                        <td><?php echo '<a href="/invoices/details?id=' . $invoice->getId() . '" class="material-btn">Szczegóły</a>'; ?></td>
                        <td><?php echo '<a href="/invoices/edit?id=' . $invoice->getId() . '" class="material-btn">Edytuj</a>'; ?></td>
                        <td><?php echo '<a href="/invoices/delete?id=' . $invoice->getId() . '" class="material-btn">Usuń</a>' ?></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
        <div class="tbl-summary">
            <?php $summary = 0;
            if (isset($invoices)) {

                foreach ($invoices
                         as $key => $invoice) {
                    $summary += $invoice->getAmountGross();
                }
                echo "<p>Suma brutto: $summary</p>";
            } else if (isset($invoiceFilter)) {
                foreach ($invoiceFilter
                         as $key => $invoice) {
                    $summary += $invoice->getAmountGross();
                }
                echo "<p>Suma brutto: $summary</p>";
            } else if (isset($invoiceSearch)) {
                foreach ($invoiceSearch
                         as $key => $invoice) {
                    $summary += $invoice->getAmountGross();
                }
                echo "<p>Suma brutto: $summary</p>";
            }
            ?>
        </div>
    </div>

</div>
