<div id="page">
    <h2>Edytuj dokument <?php if (isset($document)) {
            echo $document->getIdInternal();
        } ?></h2>
    <br>

    <form action="/documents/update?id=<?php if (isset($document)) {
        echo $document->getId();
    } ?>" method="post">
        <div class="material-input">
            <input type='text' id="id_internal" name='id_internal' <?php if (isset($document)) {
                echo "value=" . $document->getIdInternal() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="id_internal">Id wewnątrzne</label>
        </div>

        <div class="material-input">
            <input type='text' id="description" name='description' <?php if (isset($document)) {
                echo "value=" . $document->getDescription() . "";
            } ?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="description">Opis</label>
        </div>

        <?php if (isset($contractors)) { ?>
            <label for="contractor_id">Kontrahent<br></label>
            <select id="contractor_id" name="contractor_id">
                <?php /** @var \model\Contractor $value */
                foreach ($contractors as &$value) {
                    echo "<option value=" . $value->getId() . ">" . $value->getName() . "</option>";
                } ?>
            </select>
            <br><br><br>
            <div class="material-input">
                <input type="submit" name="invoice_edit" value="Wyślij">
            </div>
        <?php } else { ?>
            <a href="/addContractor/show" class="material-btn"> Dodaj nowego kontrahenta </a>
        <?php } ?>
    </form>

</div>
