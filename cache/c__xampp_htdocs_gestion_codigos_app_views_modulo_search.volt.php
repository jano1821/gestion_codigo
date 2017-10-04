<div class="row">
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
	    <div class="btn-group pull-right">
<?= $this->tag->linkTo(['modulo/index', '<i class=\'glyphicon glyphicon-chevron-left\'></i> Volver', 'class' => 'btn btn-info']) ?>
                <?= $this->tag->linkTo(['modulo/new', '<i class=\'glyphicon glyphicon-plus\'></i> Nuevo Modulo', 'class' => 'btn btn-info']) ?>
        </div>
            <h4><i class='glyphicon glyphicon-search'></i> Resultado de Busqueda</h4>
	</div>
            <div class="page-header">
            </div>

<?= $this->getContent() ?>

<div class="table-responsive">
                <table class="table">
            <tr>
                <th>Id Módulo</th>
            <th>Prefijo de Módulo</th>
            <th>CorrelativoMódulo</th>
            <th>Descripcion del Módulo</th>
            <th>Fecha de Registro</th>
            <th>Estado de Registro</th>

                <th></th>
                <th></th>
            </tr>
        <tbody>
        <?php if (isset($page->items)) { ?>
        <?php foreach ($page->items as $modulo) { ?>
            <tr>
                <td><?= $modulo->idModulo ?></td>
            <td><?= $modulo->PrefijoModulo ?></td>
            <td><?= $modulo->correlativoModulo ?></td>
            <td><?= $modulo->descripcionModulo ?></td>
            <td><?= $modulo->fechaRegistro ?></td>
            <td><?= $modulo->estadoRegistro ?></td>

<td><?= $this->tag->linkTo(['modulo/edit/' . $modulo->idModulo, '<i class=\'glyphicon glyphicon-edit\'></i>', 'class' => 'btn btn-default']) ?></td>
                                <td><?= $this->tag->linkTo(['modulo/delete/' . $modulo->idModulo, '<i class=\'glyphicon glyphicon-trash\'></i>', 'class' => 'btn btn-default']) ?></td>

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
                <li><?= $this->tag->linkTo(['modulo/search', 'Primero']) ?></li>
                <li><?= $this->tag->linkTo(['modulo/search?page=' . $page->before, 'Anterior']) ?></li>
                <li><?= $this->tag->linkTo(['modulo/search?page=' . $page->next, 'Siguiente']) ?></li>
                <li><?= $this->tag->linkTo(['modulo/search?page=' . $page->last, 'Ultimo']) ?></li>
            </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</div>