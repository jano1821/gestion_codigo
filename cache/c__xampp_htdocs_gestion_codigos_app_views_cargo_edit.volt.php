<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
        <?= $this->tag->linkTo(['cargo/index', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
</div>
<h4><i class='glyphicon glyphicon-edit'></i> Editar Código</h4>
</div>
<div class="page-header">
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['cargo/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="table">
<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldDescripcioncargo" class="control-label">Descripcion de Cargo</label>
</div>
<div class="col-md-2">
        <?= $this->tag->textField(['descripcionCargo', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldDescripcioncargo']) ?>
    </div>
</div>


<?= $this->tag->hiddenField(['idCargo']) ?>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
</div>
<div class="col-md-2">
<?= $this->tag->submitButton(['Guardar', 'class' => 'btn btn-primary']) ?>
</div>
</div>

</div>
</form>
</div>
</div>