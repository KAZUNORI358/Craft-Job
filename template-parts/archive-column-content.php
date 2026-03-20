<!-- コラムアーカイブの記事コンテンツ -->
<article class="archive-column-content">
    <a href="<?php the_permalink(); ?>" class="archive-column-content-link">
        <div class="archive-column-content-image">
            <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title(); ?>"
                width="342" height="192">
        </div>
        <div class="archive-column-content-body">
            <p class="archive-column-content-category">
                <?php
                $terms = get_the_terms(get_the_ID(), 'column_category');
                if ($terms && !is_wp_error($terms)):
                    foreach ($terms as $term): ?>
                        <?php echo esc_html($term->name); ?>
                <?php endforeach;
                endif; ?>
            </p>
            <h2 class="archive-column-content-title"><?php the_title(); ?></h2>
            <div class="c-post-meta">
                <time class="c-post-meta-date c-post-meta-date--published" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
                <?php if (get_the_modified_date() !== get_the_date()): ?>
                    <time class="c-post-meta-date c-post-meta-date--updated" datetime="<?php echo esc_attr(get_the_modified_date('c')); ?>"><?php echo esc_html(get_the_modified_date('Y.m.d')); ?></time>
                <?php endif; ?>
            </div>
        </div>
    </a>
</article>