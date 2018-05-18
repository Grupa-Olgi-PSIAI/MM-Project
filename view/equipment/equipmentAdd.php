<div id="page">
    <form action="<?= '/' . ROUTE_EQUIPMENT . '/' . ACTION_CREATE ?>" method="post" enctype="multipart/form-data">

        <div class="material-input">
            <input type='text' id="date_created" name='date_created' required onfocus="(this.type='date')" onblur="(this.type='text')" />
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="date_created">Data utworzenia</label>
        </div>

        <div>
            <?php if (isset($users)) { ?>
                <label for="user_id">Faktury<br></label>
                <select id="user_id" name="user_id">
                    <?php /** @var \model\Contractor $value */
                    foreach ($users as $user) { ?>
                        <option value="<?= $user->getId(); ?>"><?= $user->getEmail(); ?></option>
                    <?php } ?>
                </select>
            <?php } ?>
        </div>

        <div class="material-input">
            <input type='text' id="purchase_date" name='purchase_date' required onfocus="(this.type='date')" onblur="(this.type='text')" />
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="purchase_date">Data zakupu</label>
        </div>

        <div class="material-input">
            <input type='number' step="0.01" name='price_net' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="price_net">Kwota netto</label>
        </div>

        <div class="material-input">
            <input type='text' id="serial_number" name='serial_number' pattern="^([0-9]*)$" title="dowolna liczba całkowita" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="serial_number">Numer seryjny</label>
        </div>

        <div class="material-input">
            <input type='text' id="validation_date" name='validation_date' required onfocus="(this.type='date')" onblur="(this.type='text')" />
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="validation_date">Data walidacji</label>
        </div>

        <div class="material-input">
            <input type='text' id="inventory_number" name='inventory_number' pattern="^([0-9]*)$" title="dowolna liczba całkowita" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="inventory_number">Numer inwentarza</label>
        </div>

        <div class="material-input">
            <input type='text' id="name" name='name' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="name">Nazwa</label>
        </div>

        <div>
        <?php if (isset($invoices)) { ?>
        <label for="invoice_id">Faktury<br></label>
        <select id="invoice_id" name="invoice_id">
            <?php /** @var \model\Contractor $value */
            foreach ($invoices as $invoice) { ?>
                <option value="<?= $invoice->getId(); ?>"><?= $invoice->getNumber(); ?></option>
            <?php } ?>
        </select>
        <?php } ?>
        </div>
        <br>
        <div class="material-input">
            <input type='text' id="last_updated" name='last_updated' required onfocus="(this.type='date')" onblur="(this.type='text')" />
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="last_updated">Ostatnia aktualizacja</label>
        </div>

        <div class="material-input">
            <input type='text' id="notes" name='notes'/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="notes">Notatki</label>
        </div>
            <div class="material-input">
                <input type="submit" name="add" value="Wyślij">
            </div>
    </form>

</div>
