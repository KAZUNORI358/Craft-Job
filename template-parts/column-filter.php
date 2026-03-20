<!-- コラムアーカイブページのカスタムタクソノミー絞り込みリスト -->
<ul class="archive-column-category-list">
    <?php
    $all_link = get_post_type_archive_link('column');
    $is_active = is_post_type_archive('column') ? 'is-active' : '';
    ?>
    <li class="archive-column-category-item">
        <a href="<?php echo esc_url($all_link); ?>" class="archive-column-category-link <?php echo esc_attr($is_active); ?>">すべて</a>
    </li>
    <?php
    // 登録されているカスタムタクソノミーを取得
    $terms = get_terms([
        'taxonomy' => 'column_category', // カスタムタクソノミーのスラッグ
        'hide_empty' => true, // 記事があるものだけ表示
    ]);
    // カスタムタクソノミーが存在し、エラーがない場合はループ
    if ($terms && !is_wp_error($terms)):
        foreach ($terms as $term):
            $term_link = get_term_link($term);
            $is_active = is_tax('column_category', $term->slug) ? 'is-active' : '';
    ?>
            <li class="archive-column-category-item">
                <a href="<?php echo esc_url(get_term_link($term)); ?>" class="archive-column-category-link <?php echo esc_attr($is_active); ?>">
                    <?php echo esc_html($term->name); ?>
                </a>
            </li>
    <?php endforeach;
    endif; ?>

</ul>