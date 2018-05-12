<div id="page">
    <?php
    /** @var \model\Document $document */
    if (!isset($document)) {
        throw new RuntimeException("Document is missing", 404);
    }
    ?>

    <form action="<?= '/' . ROUTE_DOCUMENTS . '/' . $document->getId() . '/' . ACTION_UPDATE ?>" method="post">
        <div class="material-input">
            <input type='text' id="id_internal" name='id_internal' value="<?= $document->getIdInternal(); ?>" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="id_internal">Id wewnętrzne</label>
        </div>

        <div class="material-input">
            <input type='text' id="description" name='description' value="<?= $document->getDescription(); ?>"
                   required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="description">Opis</label>
        </div>

        <?php if (isset($contractors)) { ?>
            <label for="contractor_id">Kontrahent<br></label>
            <select id="contractor_id" name="contractor_id">
                <?php
                /** @var \model\Contractor $value */
                foreach ($contractors as &$value) {
                    $selected = '';
                    if ($document->getContractorId() === $value->getId()) {
                        $selected = "selected";
                    } ?>
                    <option value="<?= $value->getId(); ?>" <?= $selected; ?>><?= $value->getName(); ?></option>
                <?php } ?>
            </select>
            <br><br><br>
            <div class="material-input">
                <input type="submit" name="document_edit" value="Wyślij">
            </div>
        <?php } else { ?>
            <a href="<?= '/' . ROUTE_CONTRACTORS . '/' . ACTION_SHOW ?>" class="material-btn"> Dodaj nowego
                kontrahenta </a>
        <?php } ?>
    </form>

</div>
