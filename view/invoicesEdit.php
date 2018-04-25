<div id="page">
    <h2>Edytuj fakturę <?php if(isset($invoice)){ echo $invoice->getNumber() ;}?></h2>
    <br>

    <form action="/invoices/update?id=<?php if(isset($invoice)){echo $invoice->getId();}?>" method="post">
        <div class="material-input">
            <input type='text' name='number' <?php if(isset($invoice)){ echo "value=" . $invoice->getNumber() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Numer faktury</label>
        </div>

        <div class="material-input">
            <input type='date' name='invoice_date' <?php if(isset($invoice)){ echo "value=" . $invoice->getInvoiceDate() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Data faktury</label>
        </div>

        <div class="material-input">
            <input type='number' step="0.01" name='amount_net' <?php if(isset($invoice)){ echo "value=" . $invoice->getAmountNet() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Kwota netto</label>
        </div>

        <div class="material-input">
            <input type='number' step="0.01" name='amount_gross' <?php if(isset($invoice)){ echo "value=" . $invoice->getAmountGross() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Kwota brutto</label>
        </div>

        <div class="material-input">
            <input type='text' name='currency' value="PLN" <?php if(isset($invoice)){ echo "value=" . $invoice->getCurrency() . "";}?> required/>
            <span class="material-input-highlight"></span>
            <span class="material-input-bar"></span>
            <label>Waluta</label>
        </div>

        Kontrahent <br>

        <?php if (isset($contractors)) { ?>
            <select name="contractor_id">
                <?php foreach ($contractors as &$value) {
                    echo "<option value=" . $value->getId() . ">" . $value->getName() . "</option>";
                } ?>
            </select>
            <br><br><br>
            <div class="material-input">
                <input type="submit" name="invoice_edit" value="Wyślij">
            </div>
        <?php } else { ?>
            <a href="/addContractor/show" class="btn btn-primary"> Dodaj nowego kontrahenta </a>
        <?php }
        ?>
    </form>
</div>