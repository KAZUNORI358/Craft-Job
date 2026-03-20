<?php

/**
 * エディターのCSSを適応
 */
    function theme_enqueue_editor_css()
    {
        $post_id = get_the_ID();
        if (! $post_id) {
            wp_enqueue_style('theme-editor', get_template_directory_uri() . 'assets/css/editor-style.css', array(), '1.0.0');
            return;
        }

        $slug = get_post_field('post_name', $post_id);

        // privacyページとcolumnページの場合は専用CSSのみ読み込み.
        if ('privacy' === $slug) {
            wp_enqueue_style('theme-editor-privacy', get_template_directory_uri() . '/assets/css/editor-privacy-style.css', array(), '1.0.0');
        } elseif ('column' === get_post_type($post_id)) {
            wp_enqueue_style('theme-editor-column', get_template_directory_uri() . '/assets/css/editor-column-style.css', array(), '1.0.0');
        } else {
            // その他のページは基本のエディターCSSを読み込み.
            wp_enqueue_style('theme-editor', get_template_directory_uri() . '/assets/css/editor-style.css', array(), '1.0.0');
        }
    }
    add_action('enqueue_block_editor_assets', 'theme_enqueue_editor_css');
