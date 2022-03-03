<section class="py-4 <?= get_row_layout() ?> <?php the_sub_field('Class') ?>" id="<?php the_sub_field('ID') ?>" 
    style="background: <?= get_sub_field('background_color') ?>  url(<?= get_sub_field('background_image') ?>)">
    <div class="container">
        <div class="row">
            <?php if( have_rows('columns') ):
                while( have_rows('columns') ) : the_row(); ?>
                <div class="col">
                    <?php the_sub_field('content') ?>

                <?php
                if ( get_sub_field('button') ) : 
                    get_template_part('block-templates/part', 'button', get_sub_field('button') );
                endif ?>
                </div>
                <?php endwhile;
            endif;
            ?>
        </div>
    </div>
</section>