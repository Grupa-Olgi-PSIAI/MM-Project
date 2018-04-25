<?php

use util\DateUtils;

?>

<div id="page">

    <a href="/documents/add" class="btn btn-primary"
       style="font-size: larger; background-color: #FFC400; color: white; padding: 5px;">Dodaj nową fakturę</a>

    <form action="/documents/search" method="post">
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
        <form action="/documents/filter" method="post">
            <div class="row">
                <div class="material-input">
                    <input type="date" name='dateFrom'/>
                    <input type="date" name='dateTo'/>
                </div>
                <div class="material-input">
                    <input type="submit" name="documents_filter"  name='dateRange'/>
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
                <th>ID</th>
                <th>Wersja</th>
                <th>Data utworzenia</th>
                <th>Data modyfikacji</th>
                <th>ID faktury</th>
                <th>Opis</th>
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
            <?php if (isset($documents)) {
                foreach ($documents as $key => $document) { ?>
                    <tr>
                        <td><?php echo $document->getId() ?></td>
                        <td><?php echo $document->getVersion() ?></td>
                        <td><?php DateUtils::getPlainDate($document->getDateCreated()) ?></td>
                        <td><?php DateUtils::getPlainDate($document->getLastUpdated()) ?></td>
                        <td><?php echo $document->getIdInternal() ?></td>
                        <td><?php echo $document->getDescription() ?></td>
                        <td><?php echo $document->getContractorId() ?></td>
                        <td><?php echo '<a href="/invoices/details?id=' . $document->getId() . '" class="btn btn-primary"><button>Szczegóły</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/edit?id=' . $document->getId() . '" class="btn btn-primary"><button>Edytuj</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/delete?id=' . $document->getId() . '"><button>Usuń</button></a>' ?></td>
                    </tr>
                <?php }
            } ?>
            <?php if (isset($documentsSearch)) {
                foreach ($documentsSearch
                         as $key => $document) { ?>
                    <tr>
                        <td><?php echo $document->getId() ?></td>
                        <td><?php echo $document->getVersion() ?></td>
                        <td><?php DateUtils::getPlainDate($document->getDateCreated()) ?></td>
                        <td><?php DateUtils::getPlainDate($document->getLastUpdated()) ?></td>
                        <td><?php echo $document->getIdInternal() ?></td>
                        <td><?php echo $document->getDescription() ?></td>
                        <td><?php echo $document->getContractorId() ?></td>
                        <td><?php echo '<a href="/invoices/details?id=' . $document->getId() . '" class="btn btn-primary"><button>Szczegóły</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/edit?id=' . $document->getId() . '" class="btn btn-primary"><button>Edytuj</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/delete?id=' . $document->getId() . '"><button>Usuń</button></a>' ?></td>
                    </tr>
                <?php }
            } ?>
            <?php if (isset($documentsFilter)) {
                foreach ($documentsFilter
                         as $key => $document) { ?>
                    <tr>
                        <td><?php echo $document->getId() ?></td>
                        <td><?php echo $document->getVersion() ?></td>
                        <td><?php DateUtils::getPlainDate($document->getDateCreated()) ?></td>
                        <td><?php DateUtils::getPlainDate($document->getLastUpdated()) ?></td>
                        <td><?php echo $document->getIdInternal() ?></td>
                        <td><?php echo $document->getDescription() ?></td>
                        <td><?php echo $document->getContractorId() ?></td>
                        <td><?php echo '<a href="/invoices/details?id=' . $document->getId() . '" class="btn btn-primary"><button>Szczegóły</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/edit?id=' . $document->getId() . '" class="btn btn-primary"><button>Edytuj</button></a>'; ?></td>
                        <td><?php echo '<a href="/invoices/delete?id=' . $document->getId() . '"><button>Usuń</button></a>' ?></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>


    </div>

</div>