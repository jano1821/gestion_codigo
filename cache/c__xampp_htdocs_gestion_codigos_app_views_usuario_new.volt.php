<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
        <?= $this->tag->linkTo(['usuario/index', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
</div>
<h4><i class='glyphicon glyphicon-record'></i> Registrar Nuevo Usuario</h4>
</div>
<div class="page-header">
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['usuario/create', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="table">
<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldUsername" class="control-label">Nombre de Usuario</label>
</div>
<div class="col-md-2">
        <?= $this->tag->textField(['userName', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldUsername']) ?>
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldPassword" class="control-label">Password</label>
</div>
<div class="col-md-2">
        <?= $this->tag->passwordField(['password', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldPassword']) ?>
    </div>
</div>

<div class="form-group">
<div class="col-md-3">
</div>
<div class="col-md-2">
    <label for="fieldEstadoregistro" class="control-label">Estado de Registro</label>
</div>
<div class="col-md-3">
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