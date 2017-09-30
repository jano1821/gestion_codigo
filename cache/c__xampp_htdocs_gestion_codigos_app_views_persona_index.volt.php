<div class="page-header">
    <h1>
        Search persona
    </h1>
    <p>
        <?= $this->tag->linkTo(['persona/new', 'Create persona']) ?>
    </p>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['persona/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldIdpersona" class="col-sm-2 control-label">Idpersona</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['idpersona', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldIdpersona']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldNombrepersona" class="col-sm-2 control-label">NombrePersona</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['nombrePersona', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNombrepersona']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldIdcargo" class="col-sm-2 control-label">IdCargo</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['idCargo', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldIdcargo']) ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Search', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
