<div id="page">
    <a id="filter_popup" href="#" class="popup"></a>
    <div class="popup">
        <form title="filter" action="/license/filter" method="post">
            <div class="row">
                <div class="material-input">
                    <input type="date" name='dateFrom' title="filter"/>
                    <input type="date" name='dateTo' title="filter"/>
                    <br>
                    <input type="radio" name="whichDate" checked="checked"
                           value="createDate">po dacie utworzenia
                    <input type="radio" name="whichDate"
                           value="reviewDate">po dacie przeglądu
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
                <th>Numer</th>
                <th>Nazwa</th>
                <th>Użytkownik</th>
                <th>Data ważności</th>
                <th>Data wsparcia technicznego</th>
                <th>Data zakupu</th>
                <th>Numer faktury</th>
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
            <?php if (isset($licenses)) {
                /** @var \model\LicenseView $license */
                foreach ($licenses as $key => $license) { ?>
                    <tr>
                        <td><?= $license->getInventoryNumber(); ?></td>
                        <td><?= $license->getName(); ?></td>
                        <td><?= $license->getUserName(); ?></td>
                        <td><?= $license->getValidationDate(); ?></td>
                        <td><?= $license->getTechSupportEndDate(); ?></td>
                        <td><?= $license->getPurchaseDate(); ?></td>
                        <td><?= $license->getInvoiceNumber(); ?></td>
                        <td><?= $license->getNotes(); ?></td>
                        <td><a href="/license/<?= $license->getId(); ?>/details" class="material-btn">Szczegóły</a></td>
                        <td><a href="/license/<?= $license->getId(); ?>/edit" class="material-btn">Edytuj</a></td>
                        <td><a href="/license/<?= $license->getId(); ?>/delete" class="material-btn">Usuń</a></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
    </div>

</div>
