<div id="page">
    <h2>Dodaj dokument</h2>
    <br>

    <form action="/documents/create" method="post">
        <div class="material-input">
            <input type='text' name='version' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Numer faktury</label>
        </div>

        <div class="material-input">
            <input type='date' name='date_created' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Data faktury</label>
        </div>

        <div class="material-input">
            <input type='date' name='last_updated' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Data faktury</label>
        </div>

        <div class="material-input">
            <input type='text' name='id_internal' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Kwota netto</label>
        </div>

        <div class="material-input">
            <input type='text' name='description' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Kwota brutto</label>
        </div>

        <div class="material-input">
            <input type='text' name='contractor_id' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Waluta</label>
        </div>
        <div class="material-input">
            <input type="submit" name="invoice_add" value="Wyślij">
        </div>
    </form>

</div>