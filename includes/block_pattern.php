<?php

/**
 * デフォルトのブロックパターンを削除
 */
remove_theme_support('core-block-patterns');

/**
 * オリジナルのブロックパターンを登録
 */
function register_original_patterns()
{
    /**
     * サイトパーツカテゴリを登録
     */
    register_block_pattern_category(
        'site-parts',
        [
            'label' => 'サイトパーツ'
        ]
    );

    /**
     * box-01パターンを登録
     */
    register_block_pattern(
        'theme/info-box',
        [
            'title' => 'BOX01',
            'description' => 'タイトル付きBOX01',
            'categories' => ['site-parts'],
            'content' => '
            <!-- wp:group {"className":"box-01"} -->
            <div class="wp-block-group box-01">

            <!-- wp:paragraph {"className":"box-01-title"} -->
            <p class="box-01-title">タイトル</p>
            <!-- /wp:paragraph -->

            <!-- wp:list -->
            <ul>
            <li>テキスト</li>
            <li>テキスト</li>
            <li>テキスト</li>
            </ul>
            <!-- /wp:list -->

            </div>
            <!-- /wp:group -->
            ',
        ]
    );

    /**
     * 吹き出し（アイコン左寄せ）パターンを登録
     */
    register_block_pattern(
        'theme/speech-left',
        [
            'title' => '吹き出し（アイコン左寄せ）',
            'categories' => ['site-parts'],
            'content' => '
        
        <!-- wp:columns {"className":"balloon-left"} -->
        <div class="wp-block-columns balloon-left">
        
        <!-- wp:column {"className":"balloon-icon-column"} -->
        <div class="wp-block-column balloon-icon-column">
        
        <!-- wp:image {"sizeSlug":"thumbnail","className":"balloon-icon-image"} -->
        <figure class="wp-block-image size-thumbnail balloon-icon-image">
        <img src="" alt="">
        </figure>

        <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
        
        <!-- wp:column {"className":"balloon-text-column"} -->
        <div class="wp-block-column balloon-text-column">
        
        <!-- wp:paragraph {"className":"balloon-text"} -->
        <p class="balloon-text">ここにテキスト</p>
        <!-- /wp:paragraph -->
        
        </div>
        <!-- /wp:column -->
        
        </div>
        <!-- /wp:columns -->
        
        '
        ]
    );
    /**
     * 吹き出し（アイコン右寄せ）パターンを登録
     */
    register_block_pattern(
        'theme/speech-right',
        [
            'title' => '吹き出し（アイコン右寄せ）',
            'categories' => ['site-parts'],
            'content' => '
        
        <!-- wp:columns {"className":"balloon-right"} -->
        <div class="wp-block-columns balloon-right">

        <!-- wp:column {"className":"balloon-text-column"} -->
        <div class="wp-block-column balloon-text-column">
        
        <!-- wp:paragraph {"className":"balloon-text"} -->
        <p class="balloon-text">ここにテキスト</p>
        <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"className":"balloon-icon-column"} -->
        <div class="wp-block-column balloon-icon-column">
        
        <!-- wp:image {"sizeSlug":"thumbnail","className":"balloon-icon-image"} -->
        <figure class="wp-block-image size-thumbnail balloon-icon-image">
        <img src="" alt="">
        </figure>

        <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
        
        </div>
        <!-- /wp:columns -->
        '
        ]
    );
}
add_action('init', 'register_original_patterns');
