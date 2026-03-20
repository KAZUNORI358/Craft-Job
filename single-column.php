<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<!-- column-single -->
<section class="column-single u-ptb">
    <div class="l-container">
        <div class="column-single-header">
            <div class="column-single-header-wrapper">
                <?php
                $terms = get_the_terms(get_the_ID(), 'column_category');
                if ($terms && !is_wp_error($terms)):
                    foreach ($terms as $term): ?>
                        <p class="column-single-category">
                            <?php echo esc_html($term->name); ?>
                        </p>
                <?php endforeach;
                endif; ?>
            </div>
            <h1 class="column-single-title"><?php the_title(); ?></h1>
        </div>

        <div class="column-single-main-image">
            <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="" width="800" height="450">
        </div>
        <div class="column-single-date-wrapper">
            <time class="column-single-date column-single-date--published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                <?php echo esc_html(get_the_date('Y.m.d')); ?>
            </time>
            <?php if (get_the_modified_date() !== get_the_date()): ?>
                <time class="column-single-date column-single-date--updated" datetime="<?php echo esc_attr(get_the_modified_date('c')); ?>">
                    <?php echo esc_html(get_the_modified_date('Y.m.d')); ?>
                </time>
            <?php endif; ?>
        </div>

        <div class="column-single-content">
            <?php the_content(); ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>