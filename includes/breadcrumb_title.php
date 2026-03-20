<?php

/**
 * パンくずリストの検索結果タイトルを動的に変更（最適化）
 */
add_filter('bcn_breadcrumb_title', 'custom_search_breadcrumb_title', 10, 3);
function custom_search_breadcrumb_title($title, $type)
{
    // 検索結果ページのパンくず（かつフロントエンド）の場合のみ処理
    if (is_search() && in_array('search', $type)) {

        $title_parts = [];
        // ★ 表示順をタイトルと同じ [ 地域 / 雇用形態 / 職種 ] に固定
        $target_taxonomies = [
            'area'       => 'area',
            'role'       => 'role',
            'occupation' => 'occupation',
        ];

        foreach ($target_taxonomies as $get_key => $tax_slug) {
            $slug = isset($_GET[$get_key]) ? sanitize_text_field($_GET[$get_key]) : '';
            if ($slug) {
                $term = get_term_by('slug', $slug, $tax_slug);
                if ($term) {
                    $title_parts[] = $term->name;
                }
            }
        }

        // 年収条件の取得
        $min = !empty($_GET['min-salary']) ? (int)$_GET['min-salary'] : null;
        $max = !empty($_GET['max-salary']) ? (int)$_GET['max-salary'] : null;

        if ($min && $max) {
            $title_parts[] = "年収{$min}万〜{$max}万円";
        } elseif ($min) {
            $title_parts[] = "年収{$min}万円〜";
        } elseif ($max) {
            $title_parts[] = "年収〜{$max}万円";
        }

        if (!empty($title_parts)) {
            return sprintf('『%s』', esc_html(implode(' / ', $title_parts)));
        }

        return '求人検索結果';
    }
    return $title;
}

/**
 * パンくずの間に「求人を探す」階層を強制挿入する
 */
add_action('bcn_after_fill', 'add_recruit_archive_breadcrumb');
function add_recruit_archive_breadcrumb($breadcrumb_trail)
{
    if (is_search() || is_page(array('ranking', 'favorite'))) {
        // 求人一覧ページ（アーカイブ）のパンくずオブジェクトを作成
        $new_breadcrumb = new bcn_breadcrumb(
            '求人を探す',
            null,
            array('archive', 'post-recruit-archive'),
            home_url('/recruit'),
            true
        );

        // 検索結果（末尾）の一個前に挿入する
        array_splice($breadcrumb_trail->breadcrumbs, 1, 0, array($new_breadcrumb));
    }
}

/**
 * 投稿詳細ページでタクソノミー（エリアなど）の階層を表示しない
 */
add_filter('bcn_after_fill', 'remove_taxonomy_from_single_breadcrumb');
function remove_taxonomy_from_single_breadcrumb($breadcrumb_trail)
{
    // 求人詳細ページ（single-recruit）の場合のみ実行
    if (is_singular('recruit')) {
        // パンくずの配列をループして、タクソノミーに関連するものを削除
        foreach ($breadcrumb_trail->breadcrumbs as $key => $breadcrumb) {
            // タクソノミー（area, role, occupation等）のタイプが含まれているかチェック
            if (in_array('taxonomy', $breadcrumb->get_types())) {
                array_splice($breadcrumb_trail->breadcrumbs, $key, 1);
            }
        }
    }
}
