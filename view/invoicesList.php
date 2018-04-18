<?php

use util\DateUtils;

?>

<div id="page">

    <a href="/invoices/add" class="btn btn-primary" style="font-size: larger; background-color: #FFC400; color: white; padding: 5px;">Dodaj nową fakturę</a>
    <br>
    <h2>Lista faktur</h2>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Numer</th>
            <th>Data</th>
            <th>Kwota netto</th>
            <th>Kwota brutto</th>
            <th>Podatek</th>
            <th>Waluta</th>
            <th>Kwota netto w walucie</th>
            <th>Kontrahent</th>
        </tr>
        </thead>

        <tbody>
        <?php if (isset($invoices)) {
            foreach ($invoices as $key => $invoice) { ?>
                <tr>
                    <th scope="row"><?php echo $key ?></th>
                    <td><?php echo $invoice->getId() ?></td>
                    <td><?php echo $invoice->getNumber() ?></td>
                    <td><?php DateUtils::getPlainDate($invoice->getInvoiceDate()) ?></td>
                    <td><?php echo $invoice->getAmountNet() ?></td>
                    <td><?php echo $invoice->getAmountGross() ?></td>
                    <td><?php echo $invoice->getAmountTax() ?></td>
                    <td><?php echo $invoice->getCurrency() ?></td>
                    <td><?php echo $invoice->getAmountNetCurrency() ?></td>
                    <td><?php echo $invoice->getContractorId() ?></td>
                </tr>
            <?php }
        } ?>
        </tbody>
    </table>
</div>
