<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
<?= $this->tag->linkTo(['menu/index', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
<?= $this->tag->linkTo(['modulo/new', '<i class=\'glyphicon glyphicon-plus\'></i> Nuevo Modulo', 'class' => 'btn btn-info']) ?>
</div>
<h4><i class='glyphicon glyphicon-search'></i> Búsqueda de Módulos</h4>
</div>
<div class="page-header">
</div>
<?= $this->getContent() ?>

<?= $this->tag->form(['modulo/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="table">
<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldIdmodulo" class="control-label">Id Módulo</label>
</div>
<div class="col-md-2">
<?= $this->tag->textField(['idModulo', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldIdmodulo']) ?>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldPrefijomodulo" class="control-label">Prefijo Módulo</label>
</div>
<div class="col-md-2">
<?= $this->tag->textField(['PrefijoModulo', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldPrefijomodulo']) ?>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldCorrelativomodulo" class="control-label">Correlativo Módulo</label>
</div>
<div class="col-md-2">
<?= $this->tag->textField(['correlativoModulo', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldCorrelativomodulo']) ?>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldDescripcionmodulo" class="control-label">Descripción Módulo</label>
</div>
<div class="col-md-3">
<?= $this->tag->textField(['descripcionModulo', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldDescripcionmodulo']) ?>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldFecharegistro" class="control-label">Fecha de Registro</label>
</div>
<div class="col-md-2">
<?= $this->tag->textField(['fechaRegistro', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldFecharegistro']) ?>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldEstadoregistro" class="control-label">Estado de Registro</label>
</div>
<div class="col-md-2">
<?= $this->tag->selectStatic(['estadoRegistro', ['S' => 'Activo', 'N' => 'Inactivo'], 'class' => 'form-control']) ?>
</div>
</div>


<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
</div>
<div class="col-md-2">
<?= $this->tag->submitButton(['Buscar', 'class' => 'col-sm-10 btn btn-primary']) ?>
</div>
</div>
</div>
</form>

</div>
</div>