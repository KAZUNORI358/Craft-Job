<?php

/**
 * 求人検索（タクソノミー ＋ 年収範囲）の最適化
 */
function filter_craft_job_search($query)
{
    // 管理画面やメインクエリ以外には干渉しない
    if (is_admin() || ! $query->is_main_query() || ! $query->is_search) {
        return;
    }

    // 求人投稿タイプ（例: craft-job）の検索時のみ実行
    // ※フォームのhidden等で post_type を送るか、ここで指定
    $query->set('post_type', 'recruit');

    // --- タクソノミー検索の設定 ---
    $tax_query = array('relation' => 'AND');
    $taxonomies = array('area', 'occupation', 'role');

    foreach ($taxonomies as $tax) {
        if (! empty($_GET[$tax])) {
            $tax_query[] = array(
                'taxonomy' => $tax,
                'field'    => 'slug',
                'terms'    => sanitize_text_field($_GET[$tax]),
            );
        }
    }

    // 年収の検索条件がある場合は、年収の検索条件を追加
    if (count($tax_query) > 1) {
        $query->set('tax_query', $tax_query);
    }

    // --- 年収（数値範囲）検索の設定 ---
    $meta_query = array('relation' => 'AND');
    $salary_key = 'recruit-info_annual-salary';

    // 最低年収
    if (! empty($_GET['min-salary'])) {
        $meta_query[] = array(
            'key'     => $salary_key, // カスタムフィールドのキー名
            'value'   => (int) $_GET['min-salary'],
            'type'    => 'NUMERIC',
            'compare' => '>=',
        );
    }

    // 最高年収
    if (! empty($_GET['max-salary'])) {
        $meta_query[] = array(
            'key'     => $salary_key, // カスタムフィールドのキー名
            'value'   => (int) $_GET['max-salary'],
            'type'    => 'NUMERIC',
            'compare' => '<=',
        );
    }

    if (count($meta_query) > 1) {
        $query->set('meta_query', $meta_query);
    }
}
add_action('pre_get_posts', 'filter_craft_job_search');
