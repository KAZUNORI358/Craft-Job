<?php
/**
 * 求人の閲覧数をカウントアップする
 */
function set_post_views($postID) {
    $count_key = 'js-post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// 閲覧数を正確にカウントするために隣接投稿のキャッシュを停止（任意）
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);