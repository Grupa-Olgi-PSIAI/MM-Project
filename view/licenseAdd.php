<div id="page">
    <h2>Dodaj dokument</h2>
    <br>

    <form action="/license/create" method="post">
        <div class="material-input">
            <input type='text' id="user_id" name='user_id' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="user_id">ID użytkownika</label>
        </div>
        <div class="material-input">
            <input type='text' id="inventary_number" name='inventary_number' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="inventary_number">Numer inwentaryzacyjny</label>
        </div>
        <div class="material-input">
            <input type='text' id="name" name='name' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="name">Nazwa</label>
        </div>
        <div class="material-input">
            <input type='text' id="serial_key" name='serial_key' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="serial_key">Klucz</label>
        </div>
        <div class="material-input">
            <input type='text' id="validation_date" name='validation_date' onfocus="(this.type='date')"
                   onblur="(this.type='text')" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="validation_date">Data ważności</label>
        </div>
        <div class="material-input">
            <input type='text' id="tech_support_end_date" name='tech_support_end_date'
                   onfocus="(this.type='date')" onblur="(this.type='text')" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="tech_support_end_date">Data wspacia technicznego</label>
        </div>
        <div class="material-input">
            <input type='text' id="purchase_date" name='purchase_date'
                   onfocus="(this.type='date')" onblur="(this.type='text')" required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="purchase_date">Data zakupu</label>
        </div>
        <div class="material-input">
            <input type='text' id="price_net" name='price_net' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="price_net">Cena netto</label>
        </div>
        <div class="material-input">
            <input type='text' id="notes" name='notes' required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label for="notes">Notatki</label>
        </div>
        <div class="material-input">
            <input type="submit" name="add" value="Wyślij">
        </div>
    </form>

</div>
