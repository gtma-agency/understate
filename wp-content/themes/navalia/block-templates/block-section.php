<section class="<?= get_row_layout() ?> <?php the_sub_field('Class') ?>  <?php if (get_sub_field('background_image')) : ?>has-background-image<?php endif; ?>" id="<?php the_sub_field('ID') ?>" 
    style="<?php if (get_sub_field('background_color')): ?>background-color: <?= get_sub_field('background_color') ?>;<?php endif; ?>
    <?php if (get_sub_field('background_image')) : ?>background-image: url(<?= get_sub_field('background_image')['url'] ?>);<?php endif; ?>">
    <div class="container">
        <?php the_sub_field( 'content' ) ?>
        <?php get_template_part('block-templates/part', 'button', get_sub_field('button') ) ?>
    </div>
</section>