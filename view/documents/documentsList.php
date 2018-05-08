<div id="page">

    <ul id="content-nav">
        <li><a href="/documents/add" class="material-btn">Nowy</a></li>
        <li><a href="#filter_popup" class="material-btn">Filtruj</a></li>
        <li>
            <form class="search-bar" action="/documents/search" method="post">
                <input type="search" placeholder="Szukaj dokumentu..." name="criterium">
            </form>
        </li>
    </ul>

    <a id="filter_popup" href="#" class="popup"></a>
    <div class="popup">
        <form title="filter" action="/documents/filter" method="post">
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

    <br>
    <h2>Lista dokumentów</h2>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>ID</th>
                <th>Data utworzenia</th>
                <th>Data modyfikacji</th>
                <th>ID faktury</th>
                <th>Opis</th>
                <th>Kontrahent</th>
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
            if (isset($documents)) {
                /** @var \model\DocumentView $document */
                foreach ($documents as $key => $document) { ?>
                    <tr>
                        <td><?php echo $document->getId() ?></td>
                        <td><?php echo $document->getDateCreated() ?></td>
                        <td><?php echo $document->getLastUpdated() ?></td>
                        <td><?php echo $document->getInternalId() ?></td>
                        <td><?php echo $document->getDescription() ?></td>
                        <td><?php echo $document->getContractor() ?></td>
                        <td><?php echo '<a href="/documents/' . $document->getId() . '/details" class="material-btn">Szczegóły</a>'; ?></td>
                        <td><?php echo '<a href="/documents/' . $document->getId() . '/edit" class="material-btn">Edytuj</a>'; ?></td>
                        <td><?php echo '<a href="/documents/' . $document->getId() . '/delete" class="material-btn">Usuń</a>' ?></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
    </div>

</div>
