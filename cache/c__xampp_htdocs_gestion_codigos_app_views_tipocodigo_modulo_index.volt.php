<div class="row">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
	    <div class="btn-group pull-right">
                <?= $this->tag->linkTo(['menu/index', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
                <?= $this->tag->linkTo(['tipocodigo_modulo/new', '<i class=\'glyphicon glyphicon-plus\'></i> Nuevo Tipo modulo', 'class' => 'btn btn-info']) ?>
            </div>
            <h4><i class='glyphicon glyphicon-search'></i> Búsqueda de Tipo Módulo</h4>
	</div>
        <div class="page-header">
        </div>

<?= $this->getContent() ?>

<?= $this->tag->form(['tipocodigo_modulo/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="table">
                <div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldIdtipocodigo" class="control-label">Tipo de Código</label>
    </div>
                    <div class="col-md-3">
        <?php if (isset($tipoCodigo)) { ?>
                            <?= $this->tag->select(['idTipoCodigo', $tipoCodigo, 'useEmpty' => true, 'emptyText' => 'Seleccione un Tipo de Código...', 'emptyValue' => '', 'using' => ['idTipoCodigo', 'descripcionTipo'], 'class' => 'form-control']) ?>
                        <?php } ?>
    </div>
</div>

<div class="form-group">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
    <label for="fieldIdmodulo" class="control-label">Módulo</label>
    </div>
                    <div class="col-md-3">
        <?php if (isset($modulo)) { ?>
                            <?= $this->tag->select(['idModulo', $modulo, 'useEmpty' => true, 'emptyText' => 'Seleccione Módulo...', 'emptyValue' => '', 'using' => ['idModulo', 'descripcionModulo'], 'class' => 'form-control']) ?>
                        <?php } ?>
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