<div id="page">

    <a id="filter_popup" href="#" class="popup"></a>
    <div class="popup">
        <form title="filter" action="<?= '/' . ROUTE_EQUIPMENT . '/' . ACTION_FILTER ?>" method="post">
            <div class="row">
                <div class="material-input">
                    <input type="date" name='dateFrom' title="filter"/>
                    <input type="date" name='dateTo' title="filter"/>
                    <br>
                    <input type="radio" name="whichDate" checked="checked"
                           value="createDate">po dacie utworzenia
                    <input type="radio" name="whichDate"
                           value="validationDate">po dacie walidacji
                    <input type="radio" name="whichDate"
                           value="purchaseDate">po dacie zakupu
                </div>
                <div class="material-input">
                    <input type="submit"/>
                </div>
            </div>
        </form>
        <a class="close x" href="#">x</a>
    </div>

    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Numer seryjny</th>
                <th>Użytkownik</th>
                <th>Numer inwentarza</th>
                <th>Data zakupu</th>
                <th>Numer faktury</th>
                <th>Data walidacji</th>
                <th>Cena netto</th>
                <th>Notatki</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
            if (isset($equipments)) {
                /** @var \model\DocumentView $document */
                foreach ($equipments as $key => $equipment) { ?>
                    <tr>
                        <td><?= $equipment->getName(); ?></td>
                        <td><?= $equipment->getSerialNumber(); ?></td>
                        <td><?= $equipment->getUserName(); ?></td>
                        <td><?= $equipment->getInventoryNumber(); ?></td>
                        <td><?= $equipment->getPurchaseDate(); ?></td>
                        <td><?= $equipment->getInvoiceId(); ?></td>
                        <td><?= $equipment->getValidationDate(); ?></td>
                        <td><?= $equipment->getPriceNet(); ?></td>
                        <td><?= $equipment->getNotes(); ?></td>
                        <td><a href="<?= '/' . ROUTE_EQUIPMENT . '/' . $equipment->getId() . '/' . ACTION_DETAILS ?>"
                               class="material-btn">Szczegóły</a></td>
                        <td><a href="<?= '/' . ROUTE_EQUIPMENT . '/' . $equipment->getId() . '/' . ACTION_EDIT ?>"
                               class="material-btn">Edytuj</a></td>
                        <td><a href="<?= '/' . ROUTE_EQUIPMENT . '/' . $equipment->getId() . '/' . ACTION_DELETE ?>"
                               class="material-btn">Usuń</a></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
    </div>
    <a class="material-btn" href="<?= '/' . ROUTE_EQUIPMENT . '/' . ACTION_ADD ?>">Dodaj sprzęt</a>
</div>
