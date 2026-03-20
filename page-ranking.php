<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="recruit-ranking">
    <div class="l-container-l">
        <h1 class="c-title-primary">人気求人ランキング</h1>

        <div class="recruit-ranking-content-wrapper">
            <!-- 検索フォームコンポーネント -->
            <?php get_template_part('template-parts/search-form'); ?>

            <div class="recruit-ranking-content">
                <?php
                $args = [
                    'post_type' => 'recruit',
                    'meta_key' => 'js-post_views_count', //閲覧数のキー javascriptでカウントアップしている
                    'posts_per_page' => 7, //上位7件取得
                    'orderby' => 'meta_value_num', //数値順に並び替え
                    'order' => 'DESC', //多い順
                ];
                $query = new WP_Query($args);
                $rank = 1;
                if ($query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post();
                ?>
                        <article class="c-recruit-card">
                            <div class="recruit-ranking-content-header">
                                <div class="recruit-ranking-content-header-ranking recruit-ranking-content-header-ranking--rank<?php echo $rank; ?>">
                                    <?php echo $rank; ?>位
                                </div>

                                <div class="recruit-ranking-content-header-view">
                                    <span class="recruit-ranking-content-header-view-number">
                                        <?php echo get_post_meta(get_the_ID(), 'js-post_views_count', true); ?>
                                    </span>
                                    <span class="recruit-ranking-content-header-view-text">
                                        Views
                                    </span>
                                </div>
                            </div>
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
                                                echo implode(', ', $role_name);
                                            endif;
                                            ?>
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
                                                echo implode(', ', $occupation_name);
                                            endif;
                                            ?>
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
                                                echo implode(', ', $area_name);
                                            endif;
                                            ?>
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
                                <a href="<?php the_permalink(); ?>" class="c-recruit-card-button c-recruit-card-button--detail">詳細を見る</a>
                                <button class="c-recruit-card-button c-recruit-card-button--favorite js-favorite-button"
                                    data-id="<?php echo esc_attr(get_the_ID()); ?>"
                                    aria-label="お気に入りに追加">お気に入り</button>
                            </div>

                        </article>
                <?php
                        $rank++;
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>