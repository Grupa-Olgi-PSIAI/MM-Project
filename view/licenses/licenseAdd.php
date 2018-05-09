<div id="page">
    <form action="/license/create" method="post" enctype="multipart/form-data">
        <div class="material-input">
            <input type='text' id="inventory_number" name='inventory_number' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="inventory_number">Numer inwentaryzacyjny</label>
        </div>
        <div class="material-input">
            <input type='text' id="name" name='name' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="name">Nazwa</label>
        </div>
        <div class="material-input">
            <input type='text' id="serial_key" name='serial_key' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="serial_key">Klucz</label>
        </div>
        <div class="material-input">
            <input type='text' id="validation_date" name='validation_date' onfocus="(this.type='date')"
                   onblur="(this.type='text')" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="validation_date">Data ważności</label>
        </div>
        <div class="material-input">
            <input type='text' id="tech_support_end_date" name='tech_support_end_date'
                   onfocus="(this.type='date')" onblur="(this.type='text')" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="tech_support_end_date">Data wspacia technicznego</label>
        </div>
        <div class="material-input">
            <input type='text' id="purchase_date" name='purchase_date'
                   onfocus="(this.type='date')" onblur="(this.type='text')" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="purchase_date">Data zakupu</label>
        </div>
        <div class="material-input">
            <input type='text' id="notes" name='notes' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="notes">Notatki</label>
        </div>
        <div class="material-input">
            <input type='file' id="file" name='file'/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="file">Plik</label>
        </div>

        <table class="tbl-details">
            <?php if (isset($users)) { ?>
                <tr>
                    <td><label for="user_id">Użytkownik</label></td>
                    <td>
                        <select id="user_id" name="user_id">
                            <?php
                            /** @var \model\User $user */
                            foreach ($users as $user) { ?>
                                <option value="<?= $user->getId(); ?>"><?= $user->getFirstName() . ' ' . $user->getLastName(); ?></option>
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
                            foreach ($invoices as $invoice) { ?>
                                <option value="<?= $invoice->getId(); ?>"><?= $invoice->getNumber(); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            <?php } else { ?>
                <a href="/invoices/add" class="material-btn">Dodaj nową fakturę</a>
            <?php } ?>
        </table>

        <br><br>
        <div class="material-input">
            <input type="submit" name="add" value="Wyślij">
        </div>
    </form>

</div>
