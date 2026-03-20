<?php
// テーマサポート関連
require_once get_template_directory() . '/includes/theme_support.php';

// セキュリティ対策
require_once get_template_directory() . '/includes/security.php';

// ブロックエディタ関連
require_once get_template_directory() . '/includes/editor.php';

// Contact Form 7関連
require_once get_template_directory() . '/includes/contact-form.php';

// 投稿でのテーブルスタイルの追加
require_once get_template_directory() . '/includes/table-style.php';

// コラム投稿タイプのカスタムタクソノミー関連
require_once get_template_directory() . '/includes/column.php';

// 絞り込み検索フォーム関連
require_once get_template_directory() . '/includes/search_filter.php';

// パンくずリストの検索結果タイトルを動的に変更する
require_once get_template_directory() . '/includes/breadcrumb_title.php';

// カスタムリライトルールの追加
require_once get_template_directory() . '/includes/custom_rewrite_rule.php';

// 人気求人ランキング関連
require_once get_template_directory() . '/includes/ranking.php';

// 管理画面の求人一覧ページでID検索を可能にする
require_once get_template_directory() . '/includes/recruit-id.php';

// ブロックパターン関連
require_once get_template_directory() . '/includes/block_pattern.php';

// カスタム投稿ごとのアーカイブタイトルとディスクリプションを追加
require_once get_template_directory() . '/includes/seo_recruit_column.php';
