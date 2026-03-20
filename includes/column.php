<?php

/**
 * カスタムタクソノミーをコラム投稿タイプに紐付け
 */
function register_column_taxonomies()
{
    register_taxonomy(
        'column_category',
        'column',
        [
            'label'             => '項目',
            'hierarchical'      => true, // trueにするとカテゴリー形式（チェックボックス）になる
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'public'            => true,
        ]
    );
}
add_action('init', 'register_column_taxonomies');


/**
 * カスタムタクソノミー項目のリライト設定
 */
function column_category_rewrite() {
    // アーカイブ
    add_rewrite_rule(
        '^column/category/([^/]+)/?$',
        'index.php?taxonomy=column_category&term=$matches[1]',
        'top'
    );

    // ページネーション
    add_rewrite_rule(
        '^column/category/([^/]+)/page/([0-9]+)/?$',
        'index.php?taxonomy=column_category&term=$matches[1]&paged=$matches[2]',
        'top'
    );
}
add_action('init', 'column_category_rewrite');

// カスタムタクソノミー項目URLのリライト設定
function column_category_link($url, $term, $taxonomy) {
    if ($taxonomy === 'column_category') {
        $url = home_url('/column/category/' . $term->slug . '/');
    }
    return $url;
}
add_filter('term_link', 'column_category_link', 10, 3);
