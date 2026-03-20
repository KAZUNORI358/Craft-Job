<li class="top-recruit-item splide__slide">

    <article class="top-recruit-item-card">
        <div class="top-recruit-item-card-image">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'top-recruit-item-card-image-image')); ?>
        </div>
        <div class="top-recruit-item-card-content">
            <div class="top-recruit-item-card-company">
                <?php

                $company_id = get_field('connected_company');
                $company_logo = get_field('company-logo', $company_id);
                $company_name = get_field('company-name', $company_id);
                
                if ($company_logo):
                    // ACFの返り値を画像IDのとき、wp_get_attachment_imageを使って画像を表示する
                    echo wp_get_attachment_image($company_logo, 'full', false, array('class' => 'top-recruit-item-card-company-logo'));
                endif;
                ?>

                <p class="top-recruit-item-card-company-name"><?php echo esc_html($company_name); ?></p>
            </div>
            <h3 class="top-recruit-item-card-title"><?php the_title(); ?>
            </h3>

            <ul class="top-recruit-item-card-tag-list">
                <?php
                $recruit_tags = get_the_terms(get_the_ID(), 'job-tag');
                if ($recruit_tags):
                    foreach ($recruit_tags as $tag):
                        echo '<li class="top-recruit-item-card-tag-item">' . $tag->name . '</?php>';
                    endforeach;
                endif;
                ?>
            </ul>
        </div>
        <div
            class="top-recruit-item-card-button-wrapper top-recruit-item-card-button-wrapper--top-recruit">

            <a href="<?php echo esc_url(get_the_permalink()); ?>"
                class="top-recruit-item-card-button">詳しく見る
            </a>
        </div>
    </article>
</li>