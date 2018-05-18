<div id="page">
    <?php
    /** @var \model\EquipmentDB $equipment */
    if (!isset($equipment)) {
        throw new RuntimeException("Equipment is missing", 404);
    }
    ?>

    <form action="<?= '/' . ROUTE_EQUIPMENT . '/' . $equipment->getId() . '/' . ACTION_UPDATE ?>" method="post">
        <div class="material-input">
            <input type='text' id="name" name='name' value="<?= $equipment->getName(); ?>" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="name">Nazwa</label>
        </div>
        <div class="material-input">
            <input type='date' id="purchase_date" name='purchase_date'
                   value="<?= $equipment->getPurchaseDate()->format(\util\DateUtils::$PATTERN_DASHED_DATE); ?>" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="purchase_date">Data zakupu</label>
        </div>
        <div class="material-input">
            <input type='number' step="0.01" id="price_net" name='price_net'
                   value="<?= $equipment->getPriceNet(); ?>" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="price_net">Cena netto</label>
        </div>
        <div class="material-input">
            <input type='text' id="inventory_number" name='inventory_number'
                   value="<?= $equipment->getInventoryNumber(); ?>" pattern="^([0-9]*)$" title="dowolna liczba całkowita" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="inventory_number">Numer inwentarza</label>
        </div>
        <div class="material-input">
            <input type='text' id="serial_number" name='serial_number' value="<?= $equipment->getSerialNumber(); ?>" pattern="^([0-9]*)$" title="dowolna liczba całkowita" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="serial_number">Numer seryjny</label>
        </div>
        <div class="material-input">
            <input type='date' id="validation_date" name='validation_date'
                   value="<?= $equipment->getValidationDate()->format(\util\DateUtils::$PATTERN_DASHED_DATE); ?>" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="validation_date">Data walidacji</label>
        </div>
        <div class="material-input">
            <input type='text' id="notes" name='notes' value="<?= $equipment->getNotes(); ?>"/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="notes">Notatki</label>
        </div>

        <table class="tbl-details">
            <?php if (isset($users)) { ?>
                <tr>
                    <td><label for="user_id">Użytkownik</label></td>
                    <td>
                        <select id="user_id" name="user_id">
                            <?php
                            /** @var \model\User $user */
                            foreach ($users as $user) {
                                $selected = '';
                                if ($user->getId() === $equipment->getUserId()) {
                                    $selected = "selected";
                                } ?>
                                <option value="<?= $user->getId(); ?>" <?= $selected; ?>><?= $user->getFirstName() . ' ' . $user->getLastName(); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            <?php }
            if (isset($invoices)) { ?>
                <tr>
                    <td><label for="invoice_id">Faktura</label></td>
                    <td>
                        <select id="invoice_id" name="invoice_id">
                            <?php
                            /** @var \model\Invoice $invoice */
                            foreach ($invoices as $invoice) {
                                $selected = '';
                                if ($invoice->getId() === $equipment->getInvoiceId()) {
                                    $selected = "selected";
                                } ?>
                                <option value="<?= $invoice->getId(); ?>" <?= $selected; ?>><?= $invoice->getNumber(); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <br><br>
        <div class="material-input">
            <input type="submit" name="edit" value="Wyślij">
        </div>
    </form>

</div>
