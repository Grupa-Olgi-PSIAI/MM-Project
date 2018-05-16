<div id="page">

    <a id="filter_popup" href="#" class="popup"></a>
    <div class="popup">
        <form title="filter" action="<?= '/' . ROUTE_EQUIPMENT . '/' . ACTION_FILTER ?>" method="post">
            <div class="row">
                <div class="material-input">
                    <input title="filter" type="date" name='dateFrom'/>
                    <input title="filter" type="date" name='dateTo'/>
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
                <th>Data zakupu</th>
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

</div>
