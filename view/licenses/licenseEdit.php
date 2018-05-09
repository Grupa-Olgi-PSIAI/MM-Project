<div id="page">
    <?php
    /** @var \model\Licenses $license */
    if (!isset($license)) {
        throw new RuntimeException("License is missing", 404);
    }
    ?>

    <form action="/license/<?= $license->getId(); ?>/update" method="post">
        <div class="material-input">
            <input type='text' id="inventory_number" name='inventory_number'
                   value="<?= $license->getInventoryNumber(); ?>" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="inventory_number">Numer inwentaryzacyjny</label>
        </div>
        <div class="material-input">
            <input type='text' id="name" name='name' value="<?= $license->getName(); ?>" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="name">Nazwa</label>
        </div>
        <div class="material-input">
            <input type='text' id="serial_key" name='serial_key' value="<?= $license->getSerialKey(); ?>" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="serial_key">Klucz</label>
        </div>
        <div class="material-input">
            <input type='text' id="validation_date" name='validation_date'
                   value="<?= $license->getValidationDate()->format(\util\DateUtils::$PATTERN_DASHED_DATE); ?>"
                   required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="validation_date">Data ważności</label>
        </div>
        <div class="material-input">
            <input type='text' id="tech_support_end_date" name='tech_support_end_date'
                   value="<?= $license->getTechSupportEndDate()->format(\util\DateUtils::$PATTERN_DASHED_DATE); ?>"
                   required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="tech_support_end_date">Data wspacia technicznego</label>
        </div>
        <div class="material-input">
            <input type='text' id="purchase_date" name='purchase_date'
                   value="<?= $license->getPurchaseDate()->format(\util\DateUtils::$PATTERN_DASHED_DATE); ?>" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="purchase_date">Data zakupu</label>
        </div>
        <div class="material-input">
            <input type='text' id="notes" name='notes' value="<?= $license->getNotes(); ?>" required/>
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
                                if ($user->getId() === $license->getUserId()) {
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
                                if ($invoice->getId() === $license->getInvoiceId()) {
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
