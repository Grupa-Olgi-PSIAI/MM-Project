<div id="page">
    <h2>Dodaj fakturę</h2>
    <br>

    <form action="/invoices/create" method="post">
        <div class="material-input">
            <input type='text' name='number' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Numer faktury</label>
        </div>

        <div class="material-input">
            <input type='date' name='invoice_date' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Data faktury</label>
        </div>

        <div class="material-input">
            <input type='number' step="0.01" name='amount_net' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Kwota netto</label>
        </div>

        <div class="material-input">
            <input type='number' step="0.01" name='amount_gross' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Kwota brutto</label>
        </div>

        <div class="material-input">
            <input type='text' name='currency' value="PLN" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Waluta</label>
        </div>

        <div class="material-input">
            <input type='text' name='contractor_id' value="1" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Id kontrahenta</label>
        </div>

        <div class="material-input">
            <input type="submit" name="invoice_add" value="Wyślij">
        </div>
    </form>
</div>
