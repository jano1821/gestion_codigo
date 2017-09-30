<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['cargo/index', 'Go Back']) ?></li>
            <li class="next"><?= $this->tag->linkTo(['cargo/new', 'Create ']) ?></li>
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
                <th>IdCargo</th>
            <th>DescripcionCargo</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($page->items)) { ?>
        <?php foreach ($page->items as $cargo) { ?>
            <tr>
                <td><?= $cargo->idCargo ?></td>
            <td><?= $cargo->descripcionCargo ?></td>

                <td><?= $this->tag->linkTo(['cargo/edit/' . $cargo->idCargo, 'Edit']) ?></td>
                <td><?= $this->tag->linkTo(['cargo/delete/' . $cargo->idCargo, 'Delete']) ?></td>
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
                <li><?= $this->tag->linkTo(['cargo/search', 'First']) ?></li>
                <li><?= $this->tag->linkTo(['cargo/search?page=' . $page->before, 'Previous']) ?></li>
                <li><?= $this->tag->linkTo(['cargo/search?page=' . $page->next, 'Next']) ?></li>
                <li><?= $this->tag->linkTo(['cargo/search?page=' . $page->last, 'Last']) ?></li>
            </ul>
        </nav>
    </div>
</div>
