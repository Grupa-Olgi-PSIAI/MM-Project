<div id="page">
    <form action="<?= '/' . ROUTE_DOCUMENTS . '/' . ACTION_CREATE ?>" method="post" enctype="multipart/form-data">
        <div class="material-input">
            <input type='text' id="id_internal" name='id_internal' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="id_internal">Id wewnętrzne</label>
        </div>

        <div class="material-input">
            <input type='text' id="description" name='description' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="description">Opis</label>
        </div>

        <div class="material-input">
            <input type='file' id="file" name='file'/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="file">Plik</label>
        </div>

        <?php if (isset($contractors)) { ?>
            <label for="contractor_id">Kontrahent<br></label>
            <select id="contractor_id" name="contractor_id">
                <?php /** @var \model\Contractor $value */
                foreach ($contractors as &$value) { ?>
                    <option value="<?= $value->getId(); ?>"><?= $value->getName(); ?></option>
                <?php } ?>
            </select>
            <br><br><br>
            <div class="material-input">
                <input type="submit" name="add" value="Wyślij">
            </div>
        <?php } else { ?>
            <a href="<?= '/' . ROUTE_CONTRACTORS . '/' . ACTION_SHOW ?>" class="material-btn"> Dodaj nowego
                kontrahenta </a>
        <?php } ?>
    </form>

</div>
