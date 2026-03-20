<!-- pagination -->
<?php
global $wp_query;
if ($wp_query->max_num_pages > 1) :
?>
    <nav class="c-pagination navigation" aria-label="ページネーション">
        <h2 class="u-visually-hidden">ページネーション</h2>
        <?php
        $args = array(
            'mid_size'           => 1,
            'prev_text'          => '',
            'next_text'          => '',
            'screen_reader_text' => 'ページネーション',
        );
        the_posts_pagination($args);
        ?>
    </nav>
<?php endif; ?>