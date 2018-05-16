<div id="page">

    <a id="filter_popup" href="#" class="popup"></a>
    <div class="popup">
        <form title="filter" action="<?= '/' . ROUTE_DOCUMENTS . '/' . ACTION_FILTER ?>" method="post">
            <div class="row">
                <div class="material-input">
                    <input title="filter" type="date" name='dateFrom'/>
                    <input title="filter" type="date" name='dateTo'/>
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
                <th>Identyfikator</th>
                <th>Data utworzenia</th>
                <th>Data modyfikacji</th>
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
            <?php
            if (isset($documents)) {
                /** @var \model\DocumentView $document */
                foreach ($documents as $key => $document) { ?>
                    <tr>
                        <td><?= $document->getInternalId(); ?></td>
                        <td><?= $document->getDateCreated(); ?></td>
                        <td><?= $document->getLastUpdated(); ?></td>
                        <td><?= $document->getDescription(); ?></td>
                        <td><?= $document->getContractor(); ?></td>
                        <td><a href="<?= '/' . ROUTE_DOCUMENTS . '/' . $document->getId() . '/' . ACTION_DETAILS ?>"
                               class="material-btn">Szczegóły</a></td>
                        <td><a href="<?= '/' . ROUTE_DOCUMENTS . '/' . $document->getId() . '/' . ACTION_EDIT ?>"
                               class="material-btn">Edytuj</a></td>
                        <td><a href="<?= '/' . ROUTE_DOCUMENTS . '/' . $document->getId() . '/' . ACTION_DELETE ?>"
                               class="material-btn">Usuń</a></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
    </div>
    <a class="material-btn" href="<?= '/' . ROUTE_DOCUMENTS . '/' . ACTION_ADD ?>">Dodaj dokument</a>
</div>
