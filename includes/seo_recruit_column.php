<?php

/**
 * カスタム投稿ごとのアーカイブタイトルとディスクリプションを上書き
 */
// タイトルの上書き
add_filter('ssp_output_title', 'custom_ssp_archive_title');
function custom_ssp_archive_title($title)
{
    if (is_post_type_archive('recruit')) {
        return 'Web制作会社の求人一覧｜Craft Job';
    } elseif (is_post_type_archive('column')) {
        return '就活コラム｜Craft Job';
    }
    return $title;
}

// ディスクリプションの上書き
add_filter('ssp_output_description', 'custom_ssp_archive_description');
function custom_ssp_archive_description($description)
{
    if (is_post_type_archive('recruit')) {
        return 'Web制作会社の求人一覧です。Craft Jobでは最新の求人情報を豊富に掲載中。あなたにぴったりの仕事がきっと見つかります。';
    } elseif (is_post_type_archive('column')) {
        return 'Web制作会社への就職・転職を成功させるためのノウハウが満載。Craft Jobの就活コラムは、面接対策、業界トレンドまで、分かりやすく解説します。あなたのキャリアを一歩前へ進めるヒントがここで見つかります。';
    }
    return $description;
}
