<div id="page">
    <h2>Szczegóły dokumentu o identyfikatorze: <?php
        /** @var \model\Document $document */
        if (isset($document)) {
            echo $document->getIdInternal();
        } ?>
    </h2>
    <br>

    <label title="creation_date">Data dodania</label>
    <div class="material-input">
        <input title="creation_date" type='date' disabled name='date_created' <?php if (isset($document)) {
            echo "value=" . $document->getDateCreated() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label title="creation_date">Ostatnio aktualizowany</label>
    <div class="material-input">
        <input title="last_update" type='date' disabled name='last_updated' <?php if (isset($document)) {
            echo "value=" . $document->getLastUpdated() . "";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label title="desc">Opis</label>
    <div class="material-input">
        <input title="desc" type='text' disabled name='description' <?php if (isset($document)) {
            echo "value='" . $document->getDescription() . "'";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>

    <label title="contractor">Kontrahent</label>
    <div class="material-input">
        <input title="contractor" type='text' disabled name='contractor' <?php /** @var \model\Contractor $contractor */
        if (isset($contractor)) {
            echo "value='" . $contractor->getName() . "'";
        } ?> required/>
        <span class="material-input-highlight"></span>
        <span class="material-input-bar"></span>
    </div>
</div>
