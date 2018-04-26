<div id="page">
    <h2>Edytuj licencję</h2>
    <br>

    <form action="/license/update?id=<?php if(isset($license)){echo $license->getId();}?>" method="post">
        <div class="material-input">
            <input type='text' name='id' <?php if(isset($license)){ echo "value=" . $license->getId() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>ID</label>
        </div>
        <div class="material-input">
            <input type='text' name='version' <?php if(isset($license)){ echo "value=" . $license->getVersion() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Wersja</label>
        </div>

        <div class="material-input">
            <input type='date' name='date_created' <?php if(isset($license)){ echo "value=" . $license->getDateCreated() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Data utworzenia</label>
        </div>

        <div class="material-input">
            <input type='date' name='last_updated' <?php if(isset($license)){ echo "value=" . $license->getLastUpdated() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Data aktualizacji</label>
        </div>

        <div class="material-input">
            <input type='text' name='user_id' <?php if(isset($license)){ echo "value=" . $license->getUserId() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>ID użytkownika</label>
        </div>
        <div class="material-input">
            <input type='text' name='inventary_number' <?php if(isset($license)){ echo "value=" . $license->getInventaryNumber() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Numer inwentaryzacyjny</label>
        </div>
        <div class="material-input">
            <input type='text' name='name' <?php if(isset($license)){ echo "value=" . $license->getName() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Nazwa</label>
        </div>
        <div class="material-input">
            <input type='text' name='serial_key' <?php if(isset($license)){ echo "value=" . $license->getSerialKey() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Klucz</label>
        </div>
        <div class="material-input">
            <input type='date' name='validation_date' <?php if(isset($license)){ echo "value=" . $license->getValidationDate() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Data walidacji</label>
        </div>
        <div class="material-input">
            <input type='date' name='tech_support_end_date'<?php if(isset($license)){ echo "value=" . $license->getTechSupportEndDate() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Data przeglądu</label>
        </div>
        <div class="material-input">
            <input type='date' name='purchase_date' <?php if(isset($license)){ echo "value=" . $license->getPurchaseDate() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Data zakupu</label>
        </div>
        <div class="material-input">
            <input type='text' name='price_net' <?php if(isset($license)){ echo "value=" . $license->getPriceNet() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Cena netto</label>
        </div>
        <div class="material-input">
            <input type='text' name='notes' <?php if(isset($license)){ echo "value=" . $license->getNotes() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Notatki</label>
        </div>
        <div class="material-input">
            <input type="submit" name="invoice_add" value="Wyślij">
        </div>
    </form>

</div>