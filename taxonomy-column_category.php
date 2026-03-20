<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<!-- カラムのタクソノミー別の記事一覧 -->
<section class="archive-column u-ptb">
    <h1 class="archive-column-title"><?php single_term_title(); ?>の記事一覧</h1>
    <?php get_template_part('template-parts/column-filter'); ?>

    <!-- archive-column-content -->
    <div class="archive-column-content-wrapper l-container-l">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <?php get_template_part('template-parts/archive-column-content'); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p>投稿がありません。</p>
        <?php endif; ?>
    </div>

    <?php get_template_part('template-parts/pagination'); ?>
</section>
<?php get_footer(); ?>