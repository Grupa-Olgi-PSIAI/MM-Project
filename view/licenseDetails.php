<div id="page">
    <h2>Szczegóły licencji o numerze inwentarza: <?php
        /** @var \model\License $license */
        if (isset($license)) {
            echo $license->getInventaryNumber();
        } ?>
    </h2>
    <br>

    <label for="date_created">Data dodania</label>
    <div class="material-input">
        <input id="date_created" type='date' disabled name='date_created' <?php if (isset($license)) {
            echo "value=" . $license->getDateCreated() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label title="creation_date">Ostatnio aktualizowana</label>
    <div class="material-input">
        <input title="last_update" type='date' disabled name='last_updated' <?php if (isset($license)) {
            echo "value=" . $license->getLastUpdated() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="user">Użytkownik</label>
    <div class="material-input">
        <input id="user" type='text' disabled name='user' <?php
        /** @var \model\User $user */
        if (isset($license)) {
            echo "value='". $user->getFirstName(). " " . $user->getLastName() . "'";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="name">Nazwa</label>
    <div class="material-input">
        <input id="name" type='text' disabled name='name' <?php if (isset($license)) {
            echo "value=" . $license->getName() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="key">Klucz seryjny</label>
    <div class="material-input">
        <input id="key" type='text' disabled name='key' <?php if (isset($license)) {
            echo "value=" . $license->getSerialKey() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="validationDate">Data walidacji</label>
    <div class="material-input">
        <input id="validationDate" type='date' disabled name='validationDate' <?php if (isset($license)) {
            echo "value=" . $license->getValidationDate() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="reviewDate">Data przeglądu</label>
    <div class="material-input">
        <input id="reviewDate" type='date' disabled name='reviewDate' <?php if (isset($license)) {
            echo "value=" . $license->getTechSupportEndDate() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="purchaseDate">Data zakupu</label>
    <div class="material-input">
        <input id="purchaseDate" type='date' disabled name='purchaseDate' <?php if (isset($license)) {
            echo "value=" . $license->getPurchaseDate() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="priceNet">Cena netto</label>
    <div class="material-input">
        <input id="priceNet" type='text' disabled name='priceNet' <?php if (isset($license)) {
            echo "value=" . $license->getPriceNet() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label for="note">Notatka</label>
    <div class="material-input">
        <input id="note" type='text' disabled name='note' <?php if (isset($license)) {
            echo "value=" . $license->getNotes() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>
</div>
