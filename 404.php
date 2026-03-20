<?php get_header(); ?>
<main>
    <?php get_template_part('template-parts/breadcrumb'); ?>

    <!-- error -->
    <section class="error u-ptb">
        <div class="l-container">
            <h1 class="error-title">
                404ページです。
            </h1>
            <p class="error-text">
                申し訳ございません。<br>
                お探しのページは存在しません。
            </p>
            <a href="index.html" class="error-button">
                ホームに戻る
            </a>
        </div>
    </section>
</main>
<?php get_footer(); ?>