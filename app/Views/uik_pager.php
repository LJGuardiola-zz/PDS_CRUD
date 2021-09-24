<?php

use CodeIgniter\Pager\PagerRenderer;

$pager->setSurroundCount(2);

?>

<ul class="uk-pagination uk-flex-center" uk-margin>

    <li class="<?= $pager->getCurrentPageNumber() != 1 ?: 'uk-disabled' ?>">
        <a href="<?= $pager->getPreviousPage() ?>">
            <span uk-pagination-previous></span>
        </a>
    </li>

    <?php if ($pager->getPreviousPageNumber() > 2) : ?>
        <li><a href="<?= $pager->getFirst() ?>">1</a></li>
        <li class="uk-disabled"><span>...</span></li>
    <?php endif ?>

    <?php foreach ($pager->links() as $link) : ?>
        <?php if ($link['active']) : ?>
            <li class="uk-active">
                <span><?= $link['title'] ?></span>
            </li>
        <?php else: ?>
            <li>
                <a href="<?= $link['uri'] ?>">
                    <span><?= $link['title'] ?></span>
                </a>
            </li>
        <?php endif ?>

    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
        <li class="uk-disabled"><span>...</span></li>
        <li><a href="<?= $pager->getLast() ?>"><?= $pager->getPageCount() ?></a></li>
    <?php endif ?>

    <li class="<?= $pager->hasNext() ?: 'uk-disabled' ?>">
        <a href="<?= $pager->getNextPage() ?>">
            <span uk-pagination-next></span>
        </a>
    </li>

</ul>