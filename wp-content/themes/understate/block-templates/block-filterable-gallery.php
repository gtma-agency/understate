<section class="py-4 <?= get_row_layout() ?> <?php the_sub_field('Class') ?>" id="<?php the_sub_field('ID') ?>" 
    style="background: <?= get_sub_field('background_color') ?>  url(<?= get_sub_field('background_image')['url'] ?>)">
    <div class="container">
        <?php var_dump(get_sub_field( 'gallery' )) ?>     
    </div>
</section>