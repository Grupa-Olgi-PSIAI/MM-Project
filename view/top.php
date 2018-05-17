<div id="top-nav">
    <?php if (isset($title)) { ?>
        <h1><?= $title; ?></h1>
    <?php } ?>
    <ul id="nav">
        <li><a href="/<?= ROUTE_LOGOUT ?>"><i class="material-icons navbar logout">&#xE5DD;</i></a></li>
        <li><a href="/<?= ROUTE_ATTENDANCES . "/" . ACTION_SHOW ?>"><i class="material-icons navbar">&#xE8B5;</i></a></li>
        <?php if (isset($filter)) { ?>
            <li><a href="<?= $filter; ?>"><i class="material-icons navbar">&#xE152;</i></a></li>
        <?php }
        if (isset($search)) { ?>
            <li>
                <form class="search-bar" action="<?= $search; ?>" method="post">
                    <input type="search" placeholder="Szukaj..." name="criterium">
                </form>
            </li>
        <?php }
        if (isset($add)) { ?>
            <li><a href="<?= $add; ?>"><i class="material-icons navbar">&#xE145;</i></a></li>
        <?php } ?>
    </ul>
</div>
