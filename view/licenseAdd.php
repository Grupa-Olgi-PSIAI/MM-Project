<div id="page">
    <h2>Dodaj dokument</h2>
    <br>

    <form action="/license/create" method="post">
        <div class="material-input">
            <input type='text' name='id' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>ID</label>
        </div>
        <div class="material-input">
            <input type='date' name='version' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Wersja</label>
        </div>

        <div class="material-input">
            <input type='date' name='date_created' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Data faktury</label>
        </div>

        <div class="material-input">
            <input type='text' name='last_updated' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Data modyfikacji</label>
        </div>

        <div class="material-input">
            <input type='text' name='user_id' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>ID użytkownika</label>
        </div>
        <div class="material-input">
            <input type='text' name='inventary_number' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Numer inwentaryzacyjny</label>
        </div>
        <div class="material-input">
            <input type='text' name='name' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Nazwa</label>
        </div>
        <div class="material-input">
            <input type='text' name='serial_key' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Klucz</label>
        </div>
        <div class="material-input">
            <input type='text' name='validation_date' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Validacja data</label>
        </div>
        <div class="material-input">
            <input type='text' name='tech_support_end_date' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Support techniczny</label>
        </div>
        <div class="material-input">
            <input type='text' name='purchase_date' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Data zakupu</label>
        </div>
        <div class="material-input">
            <input type='text' name='price_net' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Cena netto</label>
        </div>
        <div class="material-input">
            <input type='text' name='notes' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Notatki</label>
        </div>
        <div class="material-input">
            <input type="submit" name="invoice_add" value="Wyślij">
        </div>
    </form>

</div>