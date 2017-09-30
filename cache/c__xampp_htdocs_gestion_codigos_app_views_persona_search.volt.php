<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['persona/index', 'Go Back']) ?></li>
            <li class="next"><?= $this->tag->linkTo(['persona/new', 'Create ']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

<?= $this->getContent() ?>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Idpersona</th>
            <th>NombrePersona</th>
            <th>IdCargo</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($page->items)) { ?>
        <?php foreach ($page->items as $persona) { ?>
            <tr>
                <td><?= $persona->idpersona ?></td>
            <td><?= $persona->nombrePersona ?></td>
            <td><?= $persona->idCargo ?></td>

                <td><?= $this->tag->linkTo(['persona/edit/' . $persona->idpersona, 'Edit']) ?></td>
                <td><?= $this->tag->linkTo(['persona/delete/' . $persona->idpersona, 'Delete']) ?></td>
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
                <li><?= $this->tag->linkTo(['persona/search', 'First']) ?></li>
                <li><?= $this->tag->linkTo(['persona/search?page=' . $page->before, 'Previous']) ?></li>
                <li><?= $this->tag->linkTo(['persona/search?page=' . $page->next, 'Next']) ?></li>
                <li><?= $this->tag->linkTo(['persona/search?page=' . $page->last, 'Last']) ?></li>
            </ul>
        </nav>
    </div>
</div>
