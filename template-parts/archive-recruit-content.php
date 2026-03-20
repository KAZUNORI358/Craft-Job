<div class="c-archive-recruit-content-wrapper">
    <!-- 検索フォームコンポーネント -->
    <?php get_template_part('template-parts/search-form'); ?>

    <div class="c-archive-recruit-content">

        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <article class="c-recruit-card">
                    <div class="c-recruit-image">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'c-recruit-image-image')); ?>
                    </div>
                    <div class="c-recruit-card-content">
                        <div class="c-recruit-card-company">
                            <?php
                            $company_id = get_field('connected_company');
                            $company_logo = get_field('company-logo', $company_id);
                            $company_name = get_field('company-name', $company_id);

                            if ($company_logo):
                                // ACFの返り値を画像IDのとき、wp_get_attachment_imageを使って画像を表示する
                                echo wp_get_attachment_image($company_logo, 'full', false, array('class' => 'c-recruit-card-company-logo'));
                            endif;
                            ?>
                            <p class="c-recruit-card-company-name"><?php echo esc_html($company_name); ?></p>
                        </div>
                        <h2 class="c-recruit-card-title"><?php the_title(); ?></h2>

                        <ul class="c-recruit-card-tag-list">
                            <?php
                            $recruit_tags = get_the_terms(get_the_ID(), 'job-tag');
                            if ($recruit_tags):
                                foreach ($recruit_tags as $tag):
                                    $tag_link = get_term_link($tag);
                                    if (is_wp_error($tag_link)) continue; ?>
                                    <li class="c-recruit-card-tag-item"><a href="<?php echo esc_url($tag_link) ?>"><?php echo esc_html($tag->name); ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>

                        <dl class="c-recruit-card-description">
                            <div class="c-recruit-card-description-item">
                                <dt class="c-recruit-card-description-item-title">雇用形態</dt>
                                <dd class="c-recruit-card-description-item-content">
                                    <?php
                                    $recruit_role = get_the_terms(get_the_ID(), 'role');
                                    if ($recruit_role):
                                        $role_name = [];
                                        foreach ($recruit_role as $role):
                                            $role_name[] = $role->name;
                                        endforeach;
                                    endif;
                                    ?>
                                    <?php echo implode(', ', $role_name); ?>
                                </dd>
                            </div>
                            <div class="c-recruit-card-description-item">
                                <dt class="c-recruit-card-description-item-title">職種</dt>
                                <dd class="c-recruit-card-description-item-content">
                                    <?php
                                    $recruit_occupation = get_the_terms(get_the_ID(), 'occupation');
                                    if ($recruit_occupation):
                                        $occupation_name = [];
                                        foreach ($recruit_occupation as $occupation):
                                            $occupation_name[] = $occupation->name;
                                        endforeach;
                                    endif;
                                    ?>
                                    <?php echo implode(', ', $occupation_name); ?>
                                </dd>
                            </div>
                            <div class="c-recruit-card-description-item">
                                <dt class="c-recruit-card-description-item-title">地域</dt>
                                <dd class="c-recruit-card-description-item-content">
                                    <?php
                                    $recruit_area = get_the_terms(get_the_ID(), 'area');
                                    if ($recruit_area):
                                        $area_name = [];
                                        foreach ($recruit_area as $area):
                                            $area_name[] = $area->name;
                                        endforeach;
                                    endif;
                                    ?>
                                    <?php echo implode(', ', $area_name); ?>
                                </dd>
                            </div>
                            <div class="c-recruit-card-description-item">
                                <dt class="c-recruit-card-description-item-title">年収</dt>
                                <dd class="c-recruit-card-description-item-content">
                                    <?php
                                    $recruit_info = get_field('recruit-info', get_the_ID());

                                    if ($recruit_info && !empty($recruit_info['annual-salary'])) {
                                        echo esc_html($recruit_info['annual-salary']);
                                    }
                                    ?>万円
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div class="c-recruit-card-button-wrapper">
                        <a href="<?php the_permalink(); ?>#entry-form" class="c-recruit-card-button c-recruit-card-button--entry">応募する</a>
                        <a href="<?php the_permalink(); ?>" class="c-recruit-card-button c-recruit-card-button--detail">詳しく見る</a>
                        <button class="c-recruit-card-button c-recruit-card-button--favorite js-favorite-button"
                            aria-label="お気に入りに追加"
                            data-id="<?php echo esc_attr(get_the_ID()); ?>">お気に入り</button>
                    </div>

                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p>求人情報がありません。</p>
        <?php endif; ?>
        <?php get_template_part('template-parts/pagination'); ?>
    </div>
</div>