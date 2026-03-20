<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="c-archive-recruit">
    <div class="l-container-l">

        <h1 class="c-title-primary">
            <?php
            $title_parts = [];
            $target_taxonomies = ['area', 'role', 'occupation'];
            foreach ($target_taxonomies as $tax) {
                if (!empty($_GET[$tax])) {
                    $term = get_term_by('slug', sanitize_text_field($_GET[$tax]), $tax);
                    if ($term) {
                        $title_parts[] = $term->name;
                    }
                }
            }

            // 年収の検索条件がある場合
            if (! empty($_GET['min-salary']) || ! empty($_GET['max-salary'])) {
                $title_parts[] = "年収" . $_GET['min-salary'] . "万〜" . $_GET['max-salary'] . "万円";
            }

            if ($title_parts) {
                echo '『' . esc_html(implode(' / ', $title_parts)) . '』の求人一覧';
            } else {
                echo esc_html('求人を探す');
            }
            ?>
        </h1>

        <?php get_template_part('template-parts/archive-recruit-content'); ?>
    </div>
</section>

<?php get_footer(); ?>