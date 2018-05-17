<div id="page">
    <?php
    /** @var \model\EquipmentView $equipment */
    if (!isset($equipment)) {
        throw new RuntimeException("Equipment is missing", 404);
    }
    ?>

    <table cellpadding="0" cellspacing="0" border="0" class="tbl-details">
        <tbody>
        <tr>
            <td>Nazwa:</td>
            <td><?= $equipment->getName(); ?></td>
        </tr>
        <tr>
            <td>Data zakupu:</td>
            <td><?= $equipment->getPurchaseDate(); ?></td>
        </tr>
        <tr>
            <td>Data utworzenia:</td>
            <td><?= $equipment->getDateCreated(); ?></td>
        </tr>
        <tr>
            <td>Data ostatniej aktualizacji:</td>
            <td><?= $equipment->getLastUpdated(); ?></td>
        </tr>
        <tr>
            <td>Cena netto:</td>
            <td><?= $equipment->getPriceNet(); ?></td>
        </tr>
        <tr>
            <td>Numer inwentarza:</td>
            <td><?= $equipment->getInventoryNumber(); ?></td>
        </tr>
        <tr>
            <td>Numer seryjny:</td>
            <td><?= $equipment->getSerialNumber(); ?></td>
        </tr>
        <tr>
            <td>Data walidacji:</td>
            <td><?= $equipment->getValidationDate(); ?></td>
        </tr>
        <tr>
            <td>Notatka:</td>
            <td><?= $equipment->getNotes(); ?></td>
        </tr>
        <tr>
            <td>Użytkownik:</td>
            <td><?= $equipment->getUserName(); ?></td>
        </tr>
        <tr>
            <td>Numer faktury:</td>
            <td><?= $equipment->getInvoiceNumber(); ?></td>
            <td><a href="<?= '/' . ROUTE_INVOICES . '/' . $equipment->getInvoiceId() . '/' . ACTION_DETAILS ?>"
                   class="material-btn">Szczegóły</a>
            </td>
        </tr>
        </tbody>
    </table>
<?php /**
    <div class="material-input">
        <?php if (is_numeric($equipment->getFileId())) { ?>
            <a href="<?= '/' . ROUTE_EQUIPMENT . '/' . $equipment->getFileId() . '/' . ACTION_DOWNLOAD ?>"
               class="material-btn">Pobierz</a>
        <?php } ?>
    </div>
 */ ?>
</div>
