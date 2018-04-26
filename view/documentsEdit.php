<div id="page">
    <h2>Edytuj dokument <?php if(isset($document)){ echo $document->getIdInternal() ;}?></h2>
    <br>

    <form action="/documents/update?id=<?php if(isset($document)){echo $document->getId();}?>" method="post">
        <div class="material-input">
            <input type='text' name='version' <?php if(isset($document)){ echo "value=" . $document->getVersion() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Wersja dokumantu</label>
        </div>

        <div class="material-input">
            <input type='date' name='date_created' <?php if(isset($document)){ echo "value=" . $document->getDateCreated() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label></label>
        </div>

        <div class="material-input">
            <input type='date' name='last_updated' <?php if(isset($document)){ echo "value=" . $document->getLastUpdated() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label></label>
        </div>

        <div class="material-input">
            <input type='text' name='id_internal' <?php if(isset($document)){ echo "value=" . $document->getIdInternal() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Id wewnątrzne</label>
        </div>

        <div class="material-input">
            <input type='text' name='description' <?php if(isset($document)){ echo "value=" . $document->getDescription() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Opis</label>
        </div>

        <div class="material-input">
            <input type='text' name='contractor_id' <?php if(isset($document)){ echo "value=" . $document->getContractorId() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>ID</label>
        </div>
        <div class="material-input">
            <input type="submit" name="document_edit" value="Wyślij">
        </div>
    </form>

</div>