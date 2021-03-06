<h3><?= $pageTitle ?></h3>

<form method = "post">

<div class="row">
<fieldset class="col p-2">
    <legend>Personne</legend>

    <div class="form-group">
        <label>Prénom</label>
        <input type="text" class="form-control" name="person[firstName]">
    </div>

    <div class="form-group">
        <label>Nom de famille</label>
        <input type="text" class="form-control" name="person[personName]">
    </div>

    <div class="form-group">
        <label>Profession</label>
        <select class="form-control" name="person[profession]">
            <?php foreach ($professionList as $profession): ?>
                <option value="<?= $profession['id'] ?>">
                    <?= $profession["profession_name"]?>
                </option>
            <?php endforeach?>
        </select>
    </div>

</fieldset>

<fieldset class="col p-2">
    <legend>Adresse</legend>

    <div class="form-group">
        <label>Adresse</label>
        <input type="text" class="form-control" name="address[street]">
    </div>

    <div class="form-group">
        <label>Code postal</label>
        <input type="text" class="form-control" name="address[zipCode]">
    </div>

    <div class="form-group">
        <label>Ville</label>
        <input type="text" class="form-control" name="address[city]">
    </div>

</fieldset>
</div>

<div>
    <button type="submit" name="submit" class="btn btn-primary btn-block">
        Valider
    </button>
</div>


</form>