<?php 
    $image = get_sub_field('image');
?>

<section style="background: <?= get_sub_field('background_color') ?>" class="<?= get_row_layout() ?> <?php the_sub_field('Class') ?> <?php the_sub_field('switch') ?>" id="<?php the_sub_field('ID') ?>">
    <div class="container ml-0">
        <div class="row">
            <div class="col-lg-6 img-col">
                <div class="d-flex h-100">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            </div>
            <div class="col-lg-6 col-xl-5 offset-xl-1 content-col p-sm-3 ps-lg-3 ps-xl-0 pe-xl-3">
                <?php the_sub_field('content') ?>
                <?php get_template_part('block-templates/part', 'button', get_sub_field('button') ) ?>
            </div> 
        </div>
    </div>
</section>