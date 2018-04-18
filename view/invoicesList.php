<?php

use repository\InvoicesRepository;


$repository = new InvoicesRepository();
$invoices = $repository->findAll();

//echo "<script>console.log(JSON.parse($invoices));</script>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>M&M - Mini Company Manager</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
<div class="container" style="margin-top: 5%">

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Version</th>
            <th>Data utworzenia</th>
            <th>Ostatnia modyfikacja</th>
            <th>Numer</th>
            <th>Data</th>
            <th>Kwota netto</th>
            <th>Kwota brutto</th>
            <th>Podatek</th>
            <th>Waluta</th>
            <th>Kwota netto w walucie</th>
            <th>Kontrahent</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($invoices as $key => $invoice) { ?>
        <tr>
            <th scope="row"><?php echo $key ?></th>
            <td><?php echo $invoice->getId() ?></td>
            <td><?php echo $invoice->getVersion() ?></td>
            <td><?php echo $invoice->getDateCreated() ?></td>
            <td><?php echo $invoice->getLastUpdated() ?></td>
            <td><?php echo $invoice->getNumber() ?></td>
            <td><?php echo $invoice->getInvoiceDate() ?></td>
            <td><?php echo $invoice->getAmountNet() ?></td>
            <td><?php echo $invoice->getAmountGross() ?></td>
            <td><?php echo $invoice->getAmountTax() ?></td>
            <td><?php echo $invoice->getCurrency() ?></td>
            <td><?php echo $invoice->getAmountNetCurrency() ?></td>
            <td><?php echo $invoice->getContractorId() ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="row" style="justify-content: end">
        <div class="col" style="justify-content: end">
            <a href="/invoices/add" class="btn btn-primary">Dodaj</a>
        </div>
    </div>
</div>

</body>
</html>