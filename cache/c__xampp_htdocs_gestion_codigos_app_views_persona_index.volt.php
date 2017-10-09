<div class="row">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
	    <div class="btn-group pull-right">
                <?= $this->tag->linkTo(['menu/index', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
                <?= $this->tag->linkTo(['persona/new', '<i class=\'glyphicon glyphicon-plus\'></i> Nueva Persona', 'class' => 'btn btn-info']) ?>
            </div>
            <h4><i class='glyphicon glyphicon-search'></i> Búsqueda de Personas</h4>
	</div>
        <div class="page-header">
        </div>

    <?= $this->getContent() ?>

    <?= $this->tag->form(['persona/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

    <div class="table">
        <div class="form-group">
            <div class="col-md-3">
            </div>
            <div class="col-md-2">
                <label for="fieldNombrepersona" class="control-label">Nombre Persona</label>
            </div>
            <div class="col-md-4">
                <?= $this->tag->textField(['nombrePersona', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNombrepersona']) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
            </div>
            <div class="col-md-2">
                <label for="fieldIdcargo" class="control-label">Cargo</label>
            </div>
            <div class="col-md-3">
                <?php if (isset($cargo)) { ?>
                    <?= $this->tag->select(['idCargo', $cargo, 'useEmpty' => true, 'emptyText' => 'Seleccione Cargo...', 'emptyValue' => '', 'using' => ['idCargo', 'descripcionCargo'], 'class' => 'form-control']) ?>
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