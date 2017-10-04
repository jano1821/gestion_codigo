<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
<?= $this->tag->linkTo(['tipocodigo/index', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
</div>
<h4><i class='glyphicon glyphicon-record'></i> Registrar Nuevo Tipo</h4>
</div>
<div class="page-header">
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['tipocodigo/create', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="table">
<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldDescripciontipo" class="control-label">Descripcion de Tipo</label>
</div>
<div class="col-md-2">
<?= $this->tag->textField(['descripcionTipo', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldDescripciontipo']) ?>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldLongitudCodigo" class="control-label">Longitud de tipo</label>
</div>
<div class="col-md-2">
<?= $this->tag->textField(['longitudCodigo', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldLongitudCodigo']) ?>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldEstadoregistro" class="control-label">Estado de Registro</label>
</div>
<div class="col-md-2">
<?= $this->tag->textField(['estadoRegistro', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldEstadoregistro']) ?>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
</div>
<div class="col-md-2">
<?= $this->tag->submitButton(['Guardar', 'class' => 'col-sm-10 btn btn-primary']) ?>
</div>
</div>
</div>
</form>
</div>
</div>