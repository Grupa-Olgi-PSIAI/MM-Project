<div id="page">
    <?php
    /** @var \model\LicenseView $license */
    if (!isset($license)) {
        throw new RuntimeException("License is missing", 404);
    }
    ?>

    <table cellpadding="0" cellspacing="0" border="0" class="tbl-details">
        <tbody>
        <tr>
            <td>Numer:</td>
            <td><?= $license->getInventoryNumber() ?></td>
        </tr>
        <tr>
            <td>Nazwa:</td>
            <td><?= $license->getName(); ?></td>
        </tr>
        <tr>
            <td>Klucz:</td>
            <td><?= $license->getSerialKey(); ?></td>
        </tr>
        <tr>
            <td>Data zakupu:</td>
            <td><?= $license->getPurchaseDate(); ?></td>
        </tr>
        <tr>
            <td>Data ważności:</td>
            <td><?= $license->getValidationDate(); ?></td>
        </tr>
        <tr>
            <td>Data wsparcia technicznego:</td>
            <td><?= $license->getTechSupportEndDate(); ?></td>
        </tr>
        <tr>
            <td>Notatki:</td>
            <td><?= $license->getNotes(); ?></td>
        </tr>
        <tr>
            <td>Data utworzenia:</td>
            <td><?= $license->getDateCreated(); ?></td>
        </tr>
        <tr>
            <td>Data aktualizacji:</td>
            <td><?= $license->getLastUpdated(); ?></td>
        </tr>
        <tr>
            <td>Użytkownik:</td>
            <td><?= $license->getUserName(); ?></td>
        </tr>
        <tr>
            <td>Numer faktury:</td>
            <td><?= $license->getInvoiceNumber(); ?></td>
            <td><a href="<?= '/' . ROUTE_INVOICES . '/' . $license->getInvoiceId() . '/' . ACTION_DETAILS ?>"
                   class="material-btn">Szczegóły</a></td>
        </tr>
        </tbody>
    </table>

    <div class="material-input">
        <?php if (is_numeric($license->getFileId())) { ?>
            <a href="/license/<?= $license->getFileId(); ?>/download" class="material-btn">Pobierz</a>
        <?php } ?>
    </div>

</div>
