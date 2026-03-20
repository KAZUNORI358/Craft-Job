<?php get_header(); ?>


<div class="top-kv">
    <div class="top-kv-person-image">
        <picture>
            <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/top-kv-person-img-sp.png" media="(max-width:  479px)">
            <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/top-kv-person-img-pc.png" media="(min-width: 480px)">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/top-kv-person-img-sp.png" width="211" height="413" alt="">
        </picture>
    </div>
    <div class="top-kv-inner l-container-l">
        <div class="top-kv-image">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/top-kv-award-no1.png" width="199" height="64" alt="制作会社の掲載数No.1"
                decoding="async" loading="lazy">
        </div>
        <p class="top-kv-title">
            <span class="top-kv-title-top">
                <span class="top-kv-title-en">Web</span><span class="top-kv-title-accent">制作会社</span><br
                    class="u-hidden-pc">への転職<span class="u-hidden-sp">を、</span>
            </span>
            <br>
            <span class="top-kv-title-bottom">
                最短ルートで。
            </span>
        </p>
        <div class="top-kv-point-wrapper">
            <div class="top-kv-point">
                <div class="top-kv-point-icon">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/top-kv-icon01.png" width="38" height="38" alt="">
                </div>
                <p class="top-kv-point-text">
                    <span class="top-kv-point-text-accent">リモート</span><br class="u-hidden-pc">求人多数
                </p>
            </div>
            <div class="top-kv-point">
                <div class="top-kv-point-icon">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/top-kv-icon02.png" width="38" height="38" alt="">
                </div>
                <p class="top-kv-point-text">
                    <span class="top-kv-point-text-accent">未経験可</span>の<br class="u-hidden-pc">求人あり
                </p>
            </div>
        </div>
    </div>
</div>

<section class="top-search">
    <h2 class="top-search-title">絞り込み検索</h2>
    <form action="<?php echo esc_url(home_url('/recruit/')); ?>" method="get" class="top-search-form">
        <input type="hidden" name="s" value="">
        <input type="hidden" name="post_type" value="recruit">
        <!-- 地域 -->
        <div class="top-search-form-item">
            <label for="area" class="u-visually-hidden">地域を選択してください</label>
            <div class="top-search-form-item-select-wrapper">
                <select name="area" id="area" class="top-search-form-item-select">
                    <option disabled selected value="">地域を選択</option>
                    <?php
                    $areas = get_terms([
                        'taxonomy' => 'area',
                        'hide_empty' => false,
                    ]);
                    if ($areas):
                        foreach ($areas as $area):
                    ?>
                            <option value="<?php echo esc_attr($area->slug); ?>" <?php selected(isset($_GET['area']) && $_GET['area'] ===  $area->slug, true); ?>><?php echo esc_html($area->name); ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>


        <!-- 雇用形態 -->
        <div class="top-search-form-item">
            <label for="role" class="u-visually-hidden">雇用形態を選択してください</label>
            <div class="top-search-form-item-select-wrapper">
                <select name="role" id="role" class="top-search-form-item-select">
                    <option disabled selected value="">雇用形態を選択</option>
                    <?php
                    $roles = get_terms([
                        'taxonomy' => 'role',
                        'hide_empty' => false,
                    ]);
                    if ($roles):
                        foreach ($roles as $role):
                    ?>
                            <option value="<?php echo esc_attr($role->slug); ?>" <?php selected(isset($_GET['role']) && $_GET['role'] ===  $role->slug, true); ?>><?php echo esc_html($role->name); ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </select>
            </div>
        </div>
        <!-- 職種 -->
        <div class="top-search-form-item">
            <label for="occupation" class="u-visually-hidden">職種を選択してください</label>
            <div class="top-search-form-item-select-wrapper">
                <select name="occupation" id="occupation" class="top-search-form-item-select">
                    <option disabled selected value="">職種を選択</option>
                    <?php
                    $occupations = get_terms([
                        'taxonomy' => 'occupation',
                        'hide_empty' => false,
                    ]);
                    if ($occupations):
                        foreach ($occupations as $occupation):
                    ?>
                            <option value="<?php echo esc_attr($occupation->slug); ?>" <?php selected(isset($_GET['occupation']) && $_GET['occupation'] ===  $occupation->slug, true); ?>><?php echo esc_html($occupation->name); ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>

        <div class="top-search-form-item">
            <button type="submit" class="top-search-form-button">検索する</button>
        </div>
    </form>
</section>

<div class="top-recruit">
    <div class="l-container-l">
        <section class="top-recruit-wrapper">
            <div class="top-recruit-header">
                <h2 class="top-recruit-title">人気求人</h2>
                <a href="<?php echo esc_url(home_url('/recruit/ranking')); ?>" class="top-recruit-link">もっと見る</a>
            </div>
            <div class="top-recruit-item-wrapper  js-recruit-card-slider splide">
                <div class="splide__track">
                    <ul class="top-recruit-item-list splide__list">
                        <?php
                        $recruit_query = new WP_Query([
                            'post_type' => 'recruit',
                            'posts_per_page' => 7,
                            'orderby' => 'meta_value_num',
                            'meta_key' => 'js-post_views_count',
                            'order' => 'DESC',
                        ]);
                        ?>
                        <?php if ($recruit_query->have_posts()): ?>
                            <?php while ($recruit_query->have_posts()): $recruit_query->the_post(); ?>

                                <?php get_template_part('template-parts/top-splide-card'); ?>

                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                </div>
                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev top-slider-button top-slider-button--prev"
                        aria-label="前へ"></button>
                    <button class="splide__arrow splide__arrow--next top-slider-button top-slider-button--next"
                        aria-label="次へ"></button>
                </div>
                <ul class="splide__pagination"></ul>
            </div>
        </section>
        <section class="top-recruit-wrapper">
            <div class="top-recruit-header">
                <h2 class="top-recruit-title">リモート可の求人</h2>
                <a href="<?php echo esc_url(home_url('/recruit/job-tag/remote')); ?>" class="top-recruit-link">もっと見る</a>
            </div>


            <div class="top-recruit-item-wrapper  js-recruit-card-slider splide">
                <div class="splide__track">
                    <ul class="top-recruit-item-list splide__list">
                        <?php
                        $recruit_query = new WP_Query([
                            'post_type' => 'recruit',
                            'posts_per_page' => 7,
                            'orderby' => 'meta_value_num',
                            'meta_key' => 'js-post_views_count',
                            'order' => 'DESC',
                            // リモート可の求人を取得
                            'tax_query' => [
                                [
                                    'taxonomy' => 'job-tag',
                                    'field' => 'slug',
                                    'terms' => 'remote',
                                ],
                            ],
                        ]);
                        ?>
                        <?php if ($recruit_query->have_posts()): ?>
                            <?php while ($recruit_query->have_posts()): $recruit_query->the_post(); ?>
                                <?php get_template_part('template-parts/top-splide-card'); ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>

                    </ul>
                </div>


                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev top-slider-button top-slider-button--prev"
                        aria-label="前へ"></button>
                    <button class="splide__arrow splide__arrow--next top-slider-button top-slider-button--next"
                        aria-label="次へ"></button>
                </div>

                <ul class="splide__pagination"></ul>

            </div>
        </section>
        <section class="top-recruit-wrapper">
            <div class="top-recruit-header">
                <h2 class="top-recruit-title">副業OKの求人</h2>
                <a href="<?php echo esc_url(home_url('/recruit/job-tag/side-job')); ?>" class="top-recruit-link">もっと見る</a>
            </div>


            <div class="top-recruit-item-wrapper  js-recruit-card-slider splide">
                <div class="splide__track">
                    <ul class="top-recruit-item-list splide__list">
                        <?php
                        $recruit_query = new WP_Query([
                            'post_type' => 'recruit',
                            'posts_per_page' => 7,
                            'orderby' => 'meta_value_num',
                            'meta_key' => 'js-post_views_count',
                            'order' => 'DESC',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'job-tag',
                                    'field' => 'slug',
                                    'terms' => 'side-job',
                                ],
                            ],
                        ]);
                        ?>
                        <?php if ($recruit_query->have_posts()): ?>
                            <?php while ($recruit_query->have_posts()): $recruit_query->the_post(); ?>
                                <?php get_template_part('template-parts/top-splide-card'); ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                </div>

                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev top-slider-button top-slider-button--prev"
                        aria-label="前へ"></button>
                    <button class="splide__arrow splide__arrow--next top-slider-button top-slider-button--next"
                        aria-label="次へ"></button>
                </div>

                <ul class="splide__pagination"></ul>

            </div>
        </section>
    </div>
</div>

<div class="top-category">
    <div class="top-category-wrapper l-container-l">
        <?php get_template_part('template-parts/search-form'); ?>

        <div class="top-category-content">
            <section class="top-category-role">
                <h2 class="c-title-primary">職種から探す</h2>
                <ul class="top-category-role-list">

                    <?php
                    $terms = get_terms([
                        'taxonomy' => 'occupation',
                        'hide_empty' => false, //職種がなくても表示する
                    ]);
                    foreach ($terms as $term): ?>
                        <li class="top-category-role-item">
                            <a href="<?php echo esc_url(get_term_link($term, "occupation")); ?>" class="top-category-role-item-link"><?php echo esc_html($term->name); ?></a>
                        </li>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>

                </ul>
            </section>

            <section class="top-category-area">
                <h2 class="c-title-primary">地域から探す</h2>
                <div class="top-category-area-content">
                    <ul class="top-category-area-title-list">
                        <li class="top-category-area-title-item">
                            <h3 class="top-category-area-title">北海道・東北</h3>
                            <ul class="top-category-area-sub-list">
                                <?php
                                $hokkaido_tohoku = ['hokkaido', 'aomori', 'iwate', 'miyagi', 'akita', 'yamagata', 'fukushima'];
                                foreach ($hokkaido_tohoku as $slug):
                                    $terms = get_term_by(
                                        'slug',
                                        $slug,
                                        'area'
                                    );
                                    if ($terms):
                                ?>
                                        <li class="top-category-area-sub-item">
                                            <a href="<?php echo esc_url(get_term_link($terms, "area")); ?>" class="top-category-area-sub-item-link"><?php echo esc_html($terms->name); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="top-category-area-title-item">
                            <h3 class="top-category-area-title">関東</h3>
                            <ul class="top-category-area-sub-list">
                                <?php
                                $kantou = ['tokyo', 'kanagawa',  'saitama', 'chiba', 'ibaraki',   'tochigi', 'gunma'];
                                foreach ($kantou as $slug):
                                    $terms = get_term_by(
                                        'slug',
                                        $slug,
                                        'area'
                                    );
                                    if ($terms):
                                ?>
                                        <li class="top-category-area-sub-item">
                                            <a href="<?php echo esc_url(get_term_link($terms, "area")); ?>" class="top-category-area-sub-item-link"><?php echo esc_html($terms->name); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="top-category-area-title-item">
                            <h3 class="top-category-area-title">中部</h3>
                            <ul class="top-category-area-sub-list">
                                <?php
                                $chubu = ['niigata', 'toyama', 'ishikawa', 'fukui', 'yamanashi', 'nagano', 'gifu', 'shizuoka', 'aichi'];
                                foreach ($chubu as $slug):
                                    $terms = get_term_by(
                                        'slug',
                                        $slug,
                                        'area'
                                    );
                                    if ($terms):
                                ?>
                                        <li class="top-category-area-sub-item">
                                            <a href="<?php echo esc_url(get_term_link($terms, "area")); ?>" class="top-category-area-sub-item-link"><?php echo esc_html($terms->name); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="top-category-area-title-item">
                            <h3 class="top-category-area-title">近畿</h3>
                            <ul class="top-category-area-sub-list">
                                <?php
                                $kinki = ['mie', 'shiga', 'kyoto', 'osaka', 'hyougo', 'nara', 'wakayama'];
                                foreach ($kinki as $slug):
                                    $terms = get_term_by(
                                        'slug',
                                        $slug,
                                        'area'
                                    );
                                    if ($terms):
                                ?>
                                        <li class="top-category-area-sub-item">
                                            <a href="<?php echo esc_url(get_term_link($terms, "area")); ?>" class="top-category-area-sub-item-link"><?php echo esc_html($terms->name); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="top-category-area-title-item">
                            <h3 class="top-category-area-title">中国</h3>
                            <ul class="top-category-area-sub-list">
                                <?php
                                $chugoku = ['tottori', 'shimane', 'okayama', 'hiroshima', 'yamaguchi'];
                                foreach ($chugoku as $slug):
                                    $terms = get_term_by(
                                        'slug',
                                        $slug,
                                        'area'
                                    );
                                    if ($terms):
                                ?>
                                        <li class="top-category-area-sub-item">
                                            <a href="<?php echo esc_url(get_term_link($terms, "area")); ?>" class="top-category-area-sub-item-link"><?php echo esc_html($terms->name); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="top-category-area-title-item">
                            <h3 class="top-category-area-title">四国</h3>
                            <ul class="top-category-area-sub-list">
                                <?php
                                $shikoku = ['tokushima', 'kagawa', 'ehime', 'kouchi'];
                                foreach ($shikoku as $slug):
                                    $terms = get_term_by(
                                        'slug',
                                        $slug,
                                        'area'
                                    );
                                    if ($terms):
                                ?>
                                        <li class="top-category-area-sub-item">
                                            <a href="<?php echo esc_url(get_term_link($terms, "area")); ?>" class="top-category-area-sub-item-link"><?php echo esc_html($terms->name); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="top-category-area-title-item">
                            <h3 class="top-category-area-title">九州・沖縄</h3>
                            <ul class="top-category-area-sub-list">
                                <?php
                                $kyushu_okinawa = ['fukuoka', 'saga', 'nagasaki', 'kumamoto', 'ooita', 'miyazaki', 'kagoshima', 'okinawa'];
                                foreach ($kyushu_okinawa as $slug):
                                    $terms = get_term_by(
                                        'slug',
                                        $slug,
                                        'area'
                                    );
                                    if ($terms):
                                ?>
                                        <li class="top-category-area-sub-item">
                                            <a href="<?php echo esc_url(get_term_link($terms, "area")); ?>" class="top-category-area-sub-item-link"><?php echo esc_html($terms->name); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </section>

            <section class="top-category-tag">
                <h2 class="c-title-primary">雇用形態/タグから探す</h2>
                <article class="top-category-tag-content">
                    <h3 class="top-category-tag-title">雇用形態から探す</h3>
                    <div class="top-category-tag-list">
                        <?php
                        $terms = get_terms([
                            'taxonomy' => 'role',
                            'hide_empty' => false,
                        ]);
                        foreach ($terms as $term): ?>
                            <div class="top-category-tag-item">
                                <a href="<?php echo esc_url(get_term_link($term, "role")); ?>" class="top-category-tag-item-link"><?php echo esc_html($term->name); ?></a>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </article>
                <article class="top-category-tag-content">
                    <h3 class="top-category-tag-title">タグから探す</h3>
                    <ul class="top-category-tag-list">
                        <?php
                        $terms = get_terms([
                            'taxonomy' => 'job-tag',
                            'hide_empty' => false,
                        ]);
                        foreach ($terms as $term): ?>
                            <li class="top-category-tag-item">
                                <a href="<?php echo esc_url(get_term_link($term, "job-tag")); ?>"
                                    class="top-category-tag-item-link top-category-tag-item-link--tag"><?php echo esc_html($term->name); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            </section>

            <section class="top-category-column">
                <h2 class="c-title-primary">就活コラム</h2>
                <div class="top-category-column-content">
                    <?php
                    $args = [
                        'post_type' => 'column',
                        'posts_per_page' => 3,
                        'order' => 'DESC', // 最新順
                    ];
                    $query = new WP_Query($args);
                    if ($query->have_posts()):
                        while ($query->have_posts()): $query->the_post(); ?>
                            <article class="top-category-column-item">
                                <a href="<?php the_permalink(); ?>" class="top-category-column-item-link">
                                    <div class="top-category-column-item-image">
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="342" height="192">
                                    </div>
                                    <div class="top-category-column-item-body">
                                        <p class="top-category-column-item-category">
                                            <?php
                                            $terms = get_the_terms(get_the_ID(), 'column_category');
                                            if ($terms && !is_wp_error($terms)):
                                                foreach ($terms as $term): ?>
                                                    <?php echo esc_html($term->name); ?>
                                            <?php endforeach;
                                            endif; ?>
                                        </p>
                                        <h3 class="top-category-column-item-title"><?php the_title(); ?>
                                        </h3>

                                        <div class="c-post-meta">
                                            <time class="c-post-meta-date c-post-meta-date--published"
                                                datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
                                            <?php if (get_the_modified_date() !== get_the_date()): ?>
                                                <time class="c-post-meta-date c-post-meta-date--updated"
                                                    datetime="<?php echo esc_attr(get_the_modified_date('c')); ?>"><?php echo esc_html(get_the_modified_date('Y.m.d')); ?></time>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </div>
</div>


<?php get_footer(); ?>