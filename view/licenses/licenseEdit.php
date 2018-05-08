<div id="page">
    <h2>Edytuj licencję</h2>
    <br>

    <form action="/license/update?id=<?php if (isset($license)) {
        echo $license->getId();
    } ?>" method="post">
        <div class="material-input">
            <input type='text' id="user_id" name='user_id' <?php if (isset($license)) {
                echo "value=" . $license->getUserId() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="user_id">ID użytkownika</label>
        </div>
        <div class="material-input">
            <input type='text' id="inventory_number" name='inventory_number' <?php if (isset($license)) {
                echo "value=" . $license->getInventoryNumber() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="inventory_number">Numer inwentaryzacyjny</label>
        </div>
        <div class="material-input">
            <input type='text' id="name" name='name' <?php if (isset($license)) {
                echo "value=" . $license->getName() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="name">Nazwa</label>
        </div>
        <div class="material-input">
            <input type='text' id="serial_key" name='serial_key' <?php if (isset($license)) {
                echo "value=" . $license->getSerialKey() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="serial_key">Klucz</label>
        </div>
        <div class="material-input">
            <input type='date' id="validation_date" name='validation_date' <?php if (isset($license)) {
                echo "value=" . $license->getValidationDate() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="validation_date">Data walidacji</label>
        </div>
        <div class="material-input">
            <input type='date' id="tech_support_end_date" name='tech_support_end_date' <?php if (isset($license)) {
                echo "value=" . $license->getTechSupportEndDate() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="tech_support_end_date">Data przeglądu</label>
        </div>
        <div class="material-input">
            <input type='date' id="purchase_date" name='purchase_date' <?php if (isset($license)) {
                echo "value=" . $license->getPurchaseDate() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="purchase_date">Data zakupu</label>
        </div>
        <div class="material-input">
            <input type='text' id="price_net" name='price_net' <?php if (isset($license)) {
                echo "value=" . $license->getPriceNet() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="price_net">Cena netto</label>
        </div>
        <div class="material-input">
            <input type='text' id="notes" name='notes' <?php if (isset($license)) {
                echo "value=" . $license->getNotes() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="notes">Notatki</label>
        </div>
        <div class="material-input">
            <input type="submit" name="invoice_add" value="Wyślij">
        </div>
    </form>

</div>
