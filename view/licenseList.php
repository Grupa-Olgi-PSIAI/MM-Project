<?php

use util\DateUtils;

?>

<div id="page">

    <a href="/documents/add" class="btn btn-primary"
       style="font-size: larger; background-color: #FFC400; color: white; padding: 5px;">Dodaj nową fakturę</a>
    <br>
    <h2>Lista faktur</h2>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>ID</th>
                <th>Wersja</th>
                <th>Data utworzenia</th>
                <th>Data modyfikacji</th>
                <th>ID użytkownika</th>
                <th>inventary_number</th>
                <th>Nazwa</th>
                <th>Klucz</th>
                <th>Data validacji</th>
                <th>Data przeglądu</th>
                <th>Data zakupu</th>
                <th>Cena netto</th>
                <th>Notatki</th>
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
            <?php if (isset($licenses)) {
                foreach ($licenses as $key => $license) { ?>
                    <tr>
                        <td><?php echo $license->getId() ?></td>
                        <td><?php echo $license->getVersion() ?></td>
                        <td><?php DateUtils::getPlainDate($license->getDateCreated()) ?></td>
                        <td><?php DateUtils::getPlainDate($license->getLastUpdated()) ?></td>
                        <td><?php echo $license->getUserId() ?></td>
                        <td><?php echo $license->getInventaryNumber() ?></td>
                        <td><?php echo $license->getName() ?></td>
                        <td><?php echo $license->getSerialKey() ?></td>
                        <td><?php echo $license->getValidationData() ?></td>
                        <td><?php echo $license->getTechSupportEndDate() ?></td>
                        <td><?php echo $license->getPurchaseDate() ?></td>
                        <td><?php echo $license->getPriceNet() ?></td>
                        <td><?php echo $license->getNotes() ?></td>
                        <td><?php echo '<a href="/invoices/details?id=' . $document->getId() . '" class="btn btn-primary"><button>Szczegóły</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/edit?id=' . $document->getId() . '" class="btn btn-primary"><button>Edytuj</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/delete?id=' . $document->getId() . '"><button>Usuń</button></a>' ?></td>
                    </tr>
                <?php }
            } ?>
            <?php  if (isset($invoice)) { ?>
                <tr>
                    <td><?php if(isset($invoice)){ echo $invoice->getNumber() ;}?></td>
                    <td><?php if(isset($invoice)){ DateUtils::getPlainDate($invoice->getInvoiceDate()); } ?></td>
                    <td><?php if(isset($invoice)){echo $invoice->getAmountNet(); } ?></td>
                    <td><?php if(isset($invoice)){echo $invoice->getAmountGross() ; }?></td>
                    <td><?php if(isset($invoice)){echo $invoice->getAmountTax(); } ?></td>
                    <td><?php if(isset($invoice)){echo $invoice->getCurrency() ; }?></td>
                    <td><?php if(isset($invoice)){echo $invoice->getContractorId() ; }?></td>
                    <td><?php if(isset($invoice)){echo '<a href="/invoices/details?id=' . $invoice->getId() . '" class="btn btn-primary">Szczegóły</a>'; ; }?></td>
                    <td><?php if(isset($invoice)){echo '<a href="/invoices/edit?id=' . $invoice->getId() . '" class="btn btn-primary">Edytuj</a>';; } ?></td>
                    <td><?php if(isset($invoice)){echo '<a href="/invoices/delete?id=' . $invoice->getId() . '">Usuń</a>' ; }?></td>
                </tr>
                <?php
            } ?>

            <?php if (isset($invoiceFilter)) {
                foreach ($invoiceFilter
                         as $key => $invoice) { ?>
                    <tr>
                        <td><?php echo $invoice->getNumber() ?></td>
                        <td><?php DateUtils::getPlainDate($invoice->getInvoiceDate()) ?></td>
                        <td><?php echo $invoice->getAmountNet() ?></td>
                        <td><?php echo $invoice->getAmountGross() ?></td>
                        <td><?php echo $invoice->getAmountTax() ?></td>
                        <td><?php echo $invoice->getCurrency() ?></td>
                        <td><?php echo $invoice->getContractorId() ?></td>
                        <td><?php echo '<a href="/invoices/details?id=' . $invoice->getId() . '" class="btn btn-primary"><button>Szczegóły</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/edit?id=' . $invoice->getId() . '" class="btn btn-primary"><button>Edytuj</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/delete?id=' . $invoice->getId() . '"><button>Usuń</button></a>' ?></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>


    </div>

</div>