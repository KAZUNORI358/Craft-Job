<?php

/**
 * Contact Form 7の自動整形を停止
 */
add_filter('wpcf7_autop_or_not', 'my_wpcf7_autop');
function my_wpcf7_autop()
{
    return false;
}

/**
 * Contact Form 7 のフィールドに現在の求人詳細ページの情報をセットする
 */
add_filter('wpcf7_special_mail_tags', 'custom_wpcf7_special_mail_tags', 10, 3);
function custom_wpcf7_special_mail_tags($output, $tag)
{
    if ($tag == '_post_title') {
        $post = get_post();
        if ($post) {
            return $post->post_title;
        }
    }
    return $output;
}
