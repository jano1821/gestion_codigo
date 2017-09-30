<div class="page-header">
    <h1>
        Search cargo
    </h1>
    <p>
        <?= $this->tag->linkTo(['cargo/new', 'Create cargo']) ?>
    </p>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['cargo/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldIdcargo" class="col-sm-2 control-label">IdCargo</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['idCargo', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldIdcargo']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldDescripcioncargo" class="col-sm-2 control-label">DescripcionCargo</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['descripcionCargo', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldDescripcioncargo']) ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Search', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
