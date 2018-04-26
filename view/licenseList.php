<?php

use util\DateUtils;

?>

<div id="page">

    <ul id="content-nav">
        <li><a href="/license/add" class="material-btn">Nowa</a></li>
        <li><a href="#filter_popup" class="material-btn">Filtruj</a></li>
        <li>
            <form class="search-bar" action="/license/search" method="post">
                <input type="search" placeholder="Szukaj licencji..." name="criterium">
            </form>
        </li>
    </ul>

    <a id="filter_popup" href="#" class="popup"></a>
    <div class="popup">
        <form title="filter" action="/license/filter" method="post">
            <div class="row">
                <div class="material-input">
                    <input type="date" name='dateFrom' title="filter"/>
                    <input type="date" name='dateTo' title="filter"/>
                    <br>
                    <input type="radio" name="whichDate"
                           value="createDate">po dacie utworzenia
                    <input type="radio" name="whichDate"
                           value="reviewDate">po dacie przeglądu
                    <input type="radio" name="whichDate"
                           value="purchaseDate">po dacie zakupu
                </div>
                <div class="material-input">
                    <input type="submit"/>
                </div>
            </div>

        </form>
        <a class="close x" href="#">x</a>
    </div>

    <br>
    <h2>Lista licencji</h2>
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
                        <td><?php echo $license->getValidationDate() ?></td>
                        <td><?php echo $license->getTechSupportEndDate() ?></td>
                        <td><?php echo $license->getPurchaseDate() ?></td>
                        <td><?php echo $license->getPriceNet() ?></td>
                        <td><?php echo $license->getNotes() ?></td>
                        <td><?php echo '<a href="/license/details?id=' . $license->getId() . '" class="material-btn btn-primary"><button>Szczegóły</button></a>'; ?></td>
                        <td><?php echo '<a href="/license/edit?id=' . $license->getId() . '" class="material-btn btn-primary"><button>Edytuj</button></a>'; ?></td>
                        <td><?php echo '<a href="/license/delete?id=' . $license->getId() . '"><button>Usuń</button></a>' ?></td>
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
                    <td><?php if (isset($invoice)) {
                            echo '<a href="/license/details?id=' . $invoice->getId() . '" class="material-btn btn-primary">Szczegóły</a>';;
                        } ?></td>
                    <td><?php if (isset($invoice)) {
                            echo '<a href="/license/edit?id=' . $invoice->getId() . '" class="material-btn btn-primary">Edytuj</a>';;
                        } ?></td>
                    <td><?php if(isset($invoice)){echo '<a href="/license/delete?id=' . $invoice->getId() . '">Usuń</a>' ; }?></td>
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
                        <td><?php echo '<a href="/license/details?id=' . $invoice->getId() . '" class="material-btn btn-primary"><button>Szczegóły</button></a>'; ?></td>
                        <td><?php echo '<a href="/license/edit?id=' . $invoice->getId() . '" class="material-btn btn-primary"><button>Edytuj</button></a>'; ?></td>
                        <td><?php echo '<a href="/license/delete?id=' . $invoice->getId() . '"><button>Usuń</button></a>' ?></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>


    </div>

</div>
