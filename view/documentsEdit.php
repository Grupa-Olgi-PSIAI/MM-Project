<div id="page">
    <h2>Edytuj dokument <?php if(isset($document)){ echo $document->getIdInternal() ;}?></h2>
    <br>

    <form action="/documents/update?id=<?php if(isset($document)){echo $document->getId();}?>" method="post">
        <div class="material-input">
            <input type='text' name='version' <?php if(isset($document)){ echo "value=" . $document->getVersion() . "";}?> pattern="^([0-9]*)\.([0-9]*)$" title="dwie liczby oddzielone kropką" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Wersja dokumantu</label>
        </div>

        <div class="material-input">
            <input type='date' name='date_created' <?php if(isset($document)){ echo "value=" . $document->getDateCreated() . "";}?> required readonly/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Data utworzenia</label>
        </div>

        <div class="material-input">
            <input type='date' name='last_updated' <?php if(isset($document)){ echo "value=" . $document->getLastUpdated() . "";}?> required readonly/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Ostatnio aktualizowany</label>
        </div>

        <div class="material-input">
            <input type='text' name='id_internal' <?php if(isset($document)){ echo "value=" . $document->getIdInternal() . "";}?> pattern="^([0-9]*)$" title="dowolna liczba" required/>
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
            Kontrahent <br>

            <?php if (isset($contractors)) { ?>
                <select name="contractor_id">
                    <?php foreach ($contractors as &$value) {
                        echo "<option value=" . $value->getId() . ">" . $value->getName() . "</option>";
                    } ?>
                </select>
                <br><br><br>
            <?php } else { ?>
                <a href="/addContractor/show" class="material-btn"> Dodaj nowego kontrahenta </a>
            <?php }
            ?>
        </div>
        <div class="material-input">
            <input type="submit" name="document_edit" value="Wyślij">
        </div>
    </form>

</div>