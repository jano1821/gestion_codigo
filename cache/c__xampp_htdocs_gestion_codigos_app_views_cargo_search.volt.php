<div class="row">
<div class="container">
<div class="panel panel-info">
<div class="panel-heading">
<div class="btn-group pull-right">
<?= $this->tag->linkTo(['cargo/index', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
<?= $this->tag->linkTo(['cargo/new', '<i class=\'glyphicon glyphicon-plus\'></i> Nuevo Cargo', 'class' => 'btn btn-info']) ?>
</div>
<h4><i class='glyphicon glyphicon-search'></i> Resultado de Busqueda</h4>
</div>
<div class="page-header">
</div>

<?= $this->getContent() ?>

<div class="table-responsive">
<table class="table">
<tr>
<th>Descripcion de Cargo</th>

<th></th>
<th></th>
</tr>
<tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $cargo) { ?>
<tr>
<td><?= $cargo->descripcionCargo ?></td>

<td><?= $this->tag->linkTo(['cargo/edit/' . $cargo->idCargo, '<i class=\'glyphicon glyphicon-edit\'></i>', 'class' => 'btn btn-default']) ?></td>
<td><?= $this->tag->linkTo(['cargo/delete/' . $cargo->idCargo, '<i class=\'glyphicon glyphicon-trash\'></i>', 'class' => 'btn btn-default']) ?></td>
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
<li><?= $this->tag->linkTo(['cargo/search', 'Primero']) ?></li>
<li><?= $this->tag->linkTo(['cargo/search?page=' . $page->before, 'Anterior']) ?></li>
<li><?= $this->tag->linkTo(['cargo/search?page=' . $page->next, 'Siguiente']) ?></li>
<li><?= $this->tag->linkTo(['cargo/search?page=' . $page->last, 'Ultimo']) ?></li>
</ul>
</nav>
</div>
</div>

</div>
</div>
</div>