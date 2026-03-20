<?php

/**
 * 投稿ページのテーブルスタイルを追加、カスタマイズする
 */
function register_table_styles()
{

    register_block_style(
        'core/table',
        [
            'name'  => 'table-type1',
            'label' => 'カスタムテーブル（ver1）',
        ]
    );

    register_block_style(
        'core/table',
        [
            'name'  => 'table-type2',
            'label' => 'カスタムテーブル（ver2）',
        ]
    );

    register_block_style(
        'core/table',
        [
            'name'  => 'table-type3',
            'label' => 'カスタムテーブル（ver3）',
        ]
    );
}
add_action('init', 'register_table_styles');
