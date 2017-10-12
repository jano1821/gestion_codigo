<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
<?= $this->tag->linkTo(['modulo/index', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
</div>
<h4><i class='glyphicon glyphicon-record'></i> Registrar Nuevo Módulo</h4>
</div>
<div class="page-header">
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['modulo/create', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="table">
<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldPrefijomodulo" class="control-label">Prefijo Módulo</label>
</div>
<div class="col-md-2">
<?= $this->tag->textField(['PrefijoModulo', 'size' => 45, 'class' => 'form-control', 'id' => 'fieldPrefijomodulo']) ?>
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
<?= $this->tag->dateField(['fechaRegistro', 'size' => 10, 'class' => 'form-control', 'id' => 'fieldFecharegistro']) ?>
</div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
<label for="fieldEstadoregistro" class="control-label">Estado de Registro</label>
</div>
<div class="col-md-2">
<?= $this->tag->selectStatic(['estadoRegistro', ['' => 'Seleccione Estado...', 'S' => 'Activo', 'N' => 'Inactivo'], 'class' => 'form-control']) ?>
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