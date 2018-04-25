<?php

use util\DateUtils;

?>

<div id="page">

    <a href="/invoices/add" class="btn btn-primary"
       style="font-size: larger; background-color: #FFC400; color: white; padding: 5px;">Dodaj nową fakturę</a>

    <form action="/invoices/search" method="post">
        <div class="row">
            <div class="material-input">
                <input type="text" name='criterium'/>
            </div>
            <div class="material-input">
                <input type="submit" name="invoice_add"  name='id'/>
            </div>
        </div>

    </form>

    <div>
        <form action="/invoices/filter" method="post">
            <div class="row">
                <div class="material-input">
                    <input type="date" name='dateFrom'/>
                    <input type="date" name='dateTo'/>
                </div>
                <div class="material-input">
                    <input type="submit" name="invoice_filter"  name='dateRange'/>
                </div>
            </div>

        </form>
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
                        <td><?php echo '<a href="/invoices/details?id=' . $invoice->getId() . '" class="btn btn-primary"><button>Szczegóły</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/edit?id=' . $invoice->getId() . '" class="btn btn-primary"><button>Edytuj</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/delete?id=' . $invoice->getId() . '"><button>Usuń</button></a>' ?></td>
                    </tr>
                <?php }
            } ?>
            <?php if (isset($invoiceSearch)) {
                foreach ($invoiceSearch
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
                        <td><?php echo '<a href="/invoices/details?id=' . $invoice->getId() . '" class="btn btn-primary"><button>Szczegóły</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/edit?id=' . $invoice->getId() . '" class="btn btn-primary"><button>Edytuj</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/delete?id=' . $invoice->getId() . '"><button>Usuń</button></a>' ?></td>
                    </tr>
                <?php }
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
                        <td><?php echo $invoice->getAmountNetCurrency() ?></td>
                        <td><?php echo $invoice->getContractorId() ?></td>
                        <td><?php echo '<a href="/invoices/details?id=' . $invoice->getId() . '" class="btn btn-primary"><button>Szczegóły</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/edit?id=' . $invoice->getId() . '" class="btn btn-primary"><button>Edytuj</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/delete?id=' . $invoice->getId() . '"><button>Usuń</button></a>' ?></td>
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
                $summary +=  $invoice->getAmountGross();
            }
            echo "<a>Suma brutto: $summary</a>";
        }
        else if(isset($invoiceFilter)){
            foreach ($invoiceFilter
                     as $key => $invoice) {
                $summary +=  $invoice->getAmountGross();
            }
            echo "<a>Suma brutto: $summary</a>";
        }
        else if(isset($invoiceSearch)){
            foreach ($invoiceSearch
                     as $key => $invoice) {
                $summary +=  $invoice->getAmountGross();
            }
            echo "<a>Suma brutto: $summary</a>";
        }
        ?>
        </div>
    </div>

</div>