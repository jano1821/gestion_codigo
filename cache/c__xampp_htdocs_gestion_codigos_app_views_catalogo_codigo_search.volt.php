<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
<?= $this->tag->linkTo(['catalogo_codigo/index', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
<?= $this->tag->linkTo(['catalogo_codigo/new', '<i class=\'glyphicon glyphicon-plus\'></i> Nuevo Codigo', 'class' => 'btn btn-info']) ?>
</div>
<h4><i class='glyphicon glyphicon-search'></i> Resultado de Busqueda</h4>
</div>
<div class="page-header">
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['catalogo_codigo/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>
<div class="table-responsive">
<table class="table">
<tr  class="info">
<th>Codigo</th>
<th>Descripcion</th>
<th>Fecha de Registro</th>
<th>Requerimiento</th>
<th>Lider Técnico</th>
<th>Lider Funcional</th>
<th>Tipo Codigo</th>
<th>Módulo</th>
<th class='text-center'></th>
<th class='text-center'></th>
</tr>
<tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $catalogoCodigo) { ?>
<tr>
<td><?= $catalogoCodigo->valorCodigo ?></td>
<td><?= $catalogoCodigo->descripcionCodigo ?></td>
<td align="center"><?= $catalogoCodigo->fechaRegistro ?></td>
<td><?= $catalogoCodigo->requerimiento ?></td>
<td><?= $catalogoCodigo->liderTecnico ?></td>
<td><?= $catalogoCodigo->liderFuncional ?></td>
<td><?= $catalogoCodigo->descripcionTipo ?></td>
<td><?= $catalogoCodigo->descripcionModulo ?></td>

<td><?= $this->tag->linkTo(['catalogo_codigo/edit/' . $catalogoCodigo->idCodigo, '<i class=\'glyphicon glyphicon-edit\'></i>', 'class' => 'btn btn-default']) ?></td>
<td><?= $this->tag->linkTo(['catalogo_codigo/delete/' . $catalogoCodigo->idCodigo, '<i class=\'glyphicon glyphicon-trash\'></i>', 'class' => 'btn btn-default']) ?></td>
</tr>
<?php } ?>
<?php } ?>
</tbody>
</table>
</div>

<?= $this->tag->hiddenField(['valorCodigo']) ?>
<?= $this->tag->hiddenField(['descripcionCodigo']) ?>
<?= $this->tag->hiddenField(['Requerimiento']) ?>
<?= $this->tag->hiddenField(['idLiderTecnico']) ?>
<?= $this->tag->hiddenField(['idLiderFuncional']) ?>
<?= $this->tag->hiddenField(['idTipoCodigo']) ?>
<?= $this->tag->hiddenField(['idModulo']) ?>
<?= $this->tag->hiddenField(['pagina']) ?>
<?= $this->tag->hiddenField(['avance']) ?>

<div class="row">
<div class="col-sm-2">
<p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
<?= 'Página ' . $page->current . ' de ' . $page->total_pages ?>
</p>
</div>
<div class="col-sm-10">
<nav>
<ul class="pagination">
<?= $this->tag->submitButton(['Primero', 'class' => 'btn btn-info', 'onclick' => 'paginacion(0);']) ?>
<?= $this->tag->submitButton(['Anterior', 'class' => 'btn btn-info', 'onclick' => 'paginacion(-1);']) ?>
<?= $this->tag->submitButton(['Siguiente', 'class' => 'btn btn-info', 'onclick' => 'paginacion(1);']) ?>
<?= $this->tag->submitButton(['Ultimo', 'class' => 'btn btn-info', 'onclick' => 'paginacion(2);']) ?>
</ul>
</nav>
</div>
</div>
</form>
</div>
</div>
</div>
<script type="text/javascript">
    function paginacion(valor){
        document.getElementById('avance').value = valor;
    }
</script>