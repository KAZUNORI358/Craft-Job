<?php

/**
 * カスタムリライトルールの追加
 */
function custom_recruit_rewrite_rule()
{
    // お気に入り求人 (/recruit/favorite)
    add_rewrite_rule('^recruit/favorite/?$', 'index.php?pagename=favorite', 'top');

    // 人気求人ランキング (/recruit/ranking)
    add_rewrite_rule('^recruit/ranking/?$', 'index.php?pagename=ranking', 'top');
}
add_action('init', 'custom_recruit_rewrite_rule');
