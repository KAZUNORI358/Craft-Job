<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<!-- コラム以外のタクソノミー別の求人一覧表示 -->
<section class="c-archive-recruit">
    <div class="l-container-l">
        <?php
        $term = get_queried_object();
        ?>
        <h1 class="c-title-primary"><?php echo esc_html($term->name); ?>の求人一覧</h1>

        <?php get_template_part('template-parts/archive-recruit-content'); ?>

    </div>
</section>

<?php get_footer(); ?>