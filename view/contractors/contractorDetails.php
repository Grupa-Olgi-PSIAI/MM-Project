<div id="page">
    <?php
    /** @var \model\Contractor $contractor */
    if (!isset($contractor)) {
        throw new RuntimeException("Contractor is missing", 404);
    }
    ?>

    <table cellpadding="0" cellspacing="0" border="0" class="tbl-details">
        <tbody>
        <tr>
            <td>Nazwa:</td>
            <td><?= $contractor->getName(); ?></td>
        </tr>
        <tr>
            <td>VAT ID:</td>
            <td><?= $contractor->getVatId(); ?></td>
        </tr>
        </tbody>
    </table>
</div>
