<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<?php
// URLパラメータにIDがある場合、それを使ってクエリを発行する
$fav_ids = isset($_GET['ids']) ? explode(',', sanitize_text_field($_GET['ids'])) : [];

$args = [
    'post_type'      => 'recruit',
    'post__in'       => !empty($fav_ids) ? $fav_ids : [0], // IDがない場合は0を入れて何も出さない
    'posts_per_page' => -1,
    'orderby'        => 'post__in'
];
$fav_query = new WP_Query($args);
?>

<section class="recruit-favorite">
    <div class="l-container-l">
        <h1 class="c-title-primary"><?php the_title(); ?></h1>

        <div class="recruit-favorite-content-wrapper">
            <!-- 検索フォームコンポーネント -->
            <?php get_template_part('template-parts/search-form'); ?>

            <div class="recruit-favorite-content">
                <?php if ($fav_query->have_posts()): ?>
                    <?php while ($fav_query->have_posts()): $fav_query->the_post(); ?>
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
                                    
                                    if ($company_logo):?>
                                        <div class="c-recruit-card-company-logo">
                                            <?php echo wp_get_attachment_image($company_logo, 'full', false, array('class' => 'c-recruit-card-company-image')); ?>
                                        </div>
                                    <?php endif; ?>
                                    <p class="c-recruit-card-company-name"><?php echo esc_html($company_name); ?></p>
                                </div>
                                <h2 class="c-recruit-card-title"><?php the_title(); ?></h2>

                                <ul class="c-recruit-card-tag-list">
                                    <?php
                                    $recruit_tag = get_the_terms(get_the_ID(), 'job-tag');
                                    if ($recruit_tag):
                                        foreach ($recruit_tag as $tag):
                                            echo '<li class="c-recruit-card-tag-item">' . esc_html($tag->name) . '</?php>';
                                        endforeach;
                                    endif;
                                    ?>
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
                                <button class="c-recruit-card-button c-recruit-card-button--favorite js-favorite-button is-active"
                                    aria-label="お気に入りに追加"
                                    data-id="<?php echo esc_attr(get_the_ID()); ?>">お気に入り</button>
                            </div>

                        </article>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>お気に入りの求人はありません。</p>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>