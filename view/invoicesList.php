<?php

use util\DateUtils;

?>

<div id="page">

    <a href="/invoices/add" class="btn btn-primary"
       style="font-size: larger; background-color: #FFC400; color: white; padding: 5px;">Dodaj nową fakturę</a>

    <form action="/invoices/search" method="post">
        <div class="row">
            <div class="material-input">
                <input type="text" name='id'/>
            </div>
            <div class="material-input">
                <input type="submit" name="invoice_add"  name='id'/>
            </div>
        </div>

    </form>

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
            <?php if (isset($invoices)) {
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
                        <td><?php echo '<a href="/invoices/details?id=' . $invoice->getId() . '" class="btn btn-primary">Szczegóły</a>'; ?></td>
                        <td><?php echo '<a href="/invoices/edit?id=' . $invoice->getId() . '" class="btn btn-primary">Edytuj</a>'; ?></td>
                        <td><?php echo '<a href="/invoices/delete?id=' . $invoice->getId() . '">Usuń</a>' ?></td>
                    </tr>
                <?php }
            } ?>
            <?php if (isset($invoice)) { ?>
                    <tr>
                        <td><?php if(isset($invoice)){ echo $invoice->getNumber() ;}?>/td>
                        <td><?php if(isset($invoice)){ DateUtils::getPlainDate($invoice->getInvoiceDate()); } ?></td>
                        <td><?php if(isset($invoice)){echo $invoice->getAmountNet(); } ?></td>
                        <td><?php if(isset($invoice)){echo $invoice->getAmountGross() ; }?></td>
                        <td><?php if(isset($invoice)){echo $invoice->getAmountTax(); } ?></td>
                        <td><?php if(isset($invoice)){echo $invoice->getCurrency() ; }?></td>
                        <td><?php if(isset($invoice)){echo $invoice->getAmountNetCurrency() ; }?></td>
                        <td><?php if(isset($invoice)){echo $invoice->getContractorId() ; }?></td>
                        <td><?php if(isset($invoice)){echo '<a href="/invoices/details?id=' . $invoice->getId() . '" class="btn btn-primary">Szczegóły</a>'; ; }?></td>
                        <td><?php if(isset($invoice)){echo '<a href="/invoices/edit?id=' . $invoice->getId() . '" class="btn btn-primary">Edytuj</a>';; } ?></td>
                        <td><?php if(isset($invoice)){echo '<a href="/invoices/delete?id=' . $invoice->getId() . '">Usuń</a>' ; }?></td>
                    </tr>
                <?php
            } ?>
            </tbody>
        </table>
    </div>

</div>
