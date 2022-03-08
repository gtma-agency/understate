<?php if ( $args ) : ?>

<a href="<?= $args['url'] ?>" class="btn btn-primary" target="<?= $args['target'] ?>">
    <span><?= $args['title'] ?></span>
</a>

<?php endif ?>