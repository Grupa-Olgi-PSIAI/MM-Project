<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>M&M - Mini Company Manager</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>

<div class="container">

<div class="card" style="margin-top: 8%">

    <div class="card-body">
        <form action="/invoices/create" method="post">
            <p class="h4 text-center py-4">Dodaj fakturę</p>
            <div class="row">
                <div class="col">
                    <label for="materialFormCardNameEx" class="font-weight-light">ID Faktury</label>
                </div>
                <div class="col">
                    <input type="text" name="id" id="id" value="2" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="materialFormCardNameEx"  class="font-weight-light">Wersja</label>
                </div>
                <div class="col">
                    <input type="text" name="version" value="2" id="version" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="materialFormCardNameEx" class="font-weight-light">Data utworzenia</label>
                </div>
                <div class="col">
                    <input type="text" name="date_created" value="2018-04-17 19:14:50" id="date_created" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="materialFormCardNameEx" class="font-weight-light">Ostatnia modyfikacja</label>
                </div>
                <div class="col">
                    <input type="text" name="last_updated" value="2018-04-17 19:14:50" id="last_updated" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="materialFormCardNameEx" class="font-weight-light">Numer faktury</label>
                </div>
                <div class="col">
                    <input type="text" name="number" value="2018-04-17 19:14:50" id="number" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="materialFormCardNameEx" class="font-weight-light">Data faktury</label>
                </div>
                <div class="col">
                    <input type="text" name="invoice_date" value="2018-04-17 19:14:50" id="invoice_date" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="materialFormCardNameEx" class="font-weight-light">Kwota netto</label>
                </div>
                <div class="col">
                    <input type="text" name="amount_net" value="2000-1-1" id="amount_net" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="materialFormCardNameEx" class="font-weight-light">Kwota brutto</label>
                </div>
                <div class="col">
                    <input type="text" name="amount_gross" value="2018-04-17 19:14:50" id="amount_gross" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="materialFormCardNameEx" class="font-weight-light">Wysokość podatku</label>
                </div>
                <div class="col">
                    <input type="text" name="amount_tax" value="2018-04-17 19:14:50" id="amount_tax" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="materialFormCardNameEx" class="font-weight-light">Waluta</label>
                </div>
                <div class="col">
                    <input type="text" name="currency" value="2000-1-1" id="currency" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="materialFormCardNameEx" class="font-weight-light">Wysokość podatku (podana w walucie)</label>
                </div>
                <div class="col">
                    <input type="text" name="amount_net_currency" value="2000-1-1" id="amount_net_currency" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="materialFormCardNameEx"  class="font-weight-light">ID kontrahenta</label>
                </div>
                <div class="col">
                    <input type="text" name="contractor_id" value="1" id="contractor_idwtwetwt" class="form-control">
                </div>
            </div>
            <div class="text-center py-4 mt-3">
                <button class="btn btn-cyan" type="submit">Register</button>
            </div>
        </form>
    </div>
</div>
    <?php if (isset($error)) echo '<p class="error"> Błąd!!! </p>' ?>
</div>
</body>

</html>

