<?php

function recruit_search_by_id($query) {

    // 管理画面かつメインクエリ以外には干渉しない
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    global $pagenow;
    // 求人一覧ページの場合
    if ($pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'recruit') {

        // IDが入力されている場合
        if (isset($_GET['s']) && is_numeric($_GET['s'])) {

            // IDをクエリに追加
            $query->set('p', intval($_GET['s']));
            $query->set('s', '');

        }
    }
}
add_action('pre_get_posts', 'recruit_search_by_id');