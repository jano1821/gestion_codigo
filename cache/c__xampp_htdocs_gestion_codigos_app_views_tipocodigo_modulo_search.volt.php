<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
<?= $this->tag->linkTo(['tipocodigo_modulo/index', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
<?= $this->tag->linkTo(['tipocodigo_modulo/new', '<i class=\'glyphicon glyphicon-plus\'></i> Nuevo Tipo Modulo', 'class' => 'btn btn-info']) ?>
</div>
<h4><i class='glyphicon glyphicon-search'></i> Resultado de Búsqueda</h4>
</div>
<div class="page-header">
</div>

<?= $this->getContent() ?>

<div class="table-responsive">
<table class="table">
<tr  class="info">
<th>Tipo Código</th>
<th>Módulo</th>
<th>Correlativo Módulo</th>

<th></th>
<th></th>
</tr>
<tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $tipoCodigoModulo) { ?>
<tr>
<td><?= $tipoCodigoModulo->descripcionTipo ?></td>
<td><?= $tipoCodigoModulo->descripcionModulo ?></td>
<td><?= $tipoCodigoModulo->correlativoModulo ?></td>

<td>
<?= $this->tag->linkTo(['tipocodigo_modulo/edit/' . $tipoCodigoModulo->idTipoCodigo . '/' . $tipoCodigoModulo->idModulo, '<i class=\'glyphicon glyphicon-edit\'></i>', 'class' => 'btn btn-default']) ?>
</td>
<td>
<?= $this->tag->linkTo(['tipocodigo_modulo/delete/' . $tipoCodigoModulo->idTipoCodigo . '/' . $tipoCodigoModulo->idModulo, '<i class=\'glyphicon glyphicon-trash\'></i>', 'class' => 'btn btn-default']) ?>
</td>
</tr>

<?php } ?>
<?php } ?>
</tbody>
</table>
</div>

<div class="row">
<div class="col-sm-1">
<p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
<?= $page->current . '/' . $page->total_pages ?>
</p>
</div>
<div class="col-sm-11">
<nav>
<ul class="pagination">
<li><?= $this->tag->linkTo(['tipocodigo_modulo/search', 'Primero']) ?></li>
<li><?= $this->tag->linkTo(['tipocodigo_modulo/search?page=' . $page->before, 'Anterior']) ?></li>
<li><?= $this->tag->linkTo(['tipocodigo_modulo/search?page=' . $page->next, 'Siguiente']) ?></li>
<li><?= $this->tag->linkTo(['tipocodigo_modulo/search?page=' . $page->last, 'ultimo']) ?></li>
</ul>
</nav>
</div>
</div>

</div>
</div>
</div>