<div id="page">
    <?php
    /** @var \model\DocumentView $document */
    if (!isset($document)) {
        throw new RuntimeException("Document is missing", 404);
    }
    ?>

    <table cellpadding="0" cellspacing="0" border="0" class="tbl-details">
        <tbody>
        <tr>
            <td>Identyfikator:</td>
            <td><?= $document->getInternalId(); ?></td>
        </tr>
        <tr>
            <td>Data dodania dokumentu:</td>
            <td><?= $document->getDateCreated(); ?></td>
        </tr>
        <tr>
            <td>Data aktualizacji dokumentu:</td>
            <td><?= $document->getLastUpdated(); ?></td>
        </tr>
        <tr>
            <td>Opis</td>
            <td><?= $document->getDescription(); ?></td>
        </tr>
        <tr>
            <td>Kontrahent</td>
            <td><?= $document->getContractor(); ?></td>
            <td><a href="<?= '/' . ROUTE_CONTRACTORS . '/' . $document->getContractorId() . '/' . ACTION_DETAILS ?>"
                   class="material-btn">Szczegóły</a>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="material-input">
        <?php if (is_numeric($document->getFileId())) { ?>
            <a href="/documents/<?= $document->getFileId(); ?>/download" class="material-btn">Pobierz</a>
        <?php } ?>
    </div>
</div>
