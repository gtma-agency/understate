<section class="py-4 <?= get_row_layout() ?> <?php the_sub_field('Class') ?>" id="<?php the_sub_field('ID') ?>" 
    style="background: <?= get_sub_field('background_color') ?>  url(<?= get_sub_field('background_image')['url'] ?>)">
    <div class="container">
        <h2><?php the_sub_field( 'heading' ) ?></h2>
        
        <?php the_sub_field('subhead') ?>

        <?php get_template_part('block-templates/part', 'button', get_sub_field('button') ) ?>
    </div>
</section>