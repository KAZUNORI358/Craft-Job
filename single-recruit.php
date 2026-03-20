<?php get_header(); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>

<!-- 閲覧数をカウントアップ -->
<?php set_post_views(get_the_ID()); ?>
<!-- recruit-single -->
<div class="recruit-single u-ptb">
    <div class="recruit-single-inner l-container-l">
        <section class="recruit-single-main">
            <h1 class="recruit-single-title"><?php the_title(); ?></h1>
            <div class="recruit-single-header">
                <div class="recruit-single-header-button-wrapper">
                    <a href="#recruit-terms" class="recruit-single-header-button js-smooth-scroll">募集要項</a>
                    <a href="#company-overview" class="recruit-single-header-button js-smooth-scroll">会社概要</a>
                    <a href="#entry-form"
                        class="recruit-single-header-button recruit-single-header-button--entry js-smooth-scroll">エントリーする</a>
                </div>
                <button class="recruit-single-header-button-favorite js-favorite-button" aria-label="お気に入りに追加" data-id="<?php echo esc_attr(get_the_ID()); ?>">
                </button>
            </div>

            <article class="recruit-single-content" id="recruit-terms">
                <h2 class="recruit-single-content-title">募集要項</h2>
                <dl class="recruit-single-content-list">
                    <!-- 業務内容 -->
                    <div class="recruit-single-content-list-item">
                        <dt class="recruit-single-content-list-item-title">業務内容</dt>
                        <dd class="recruit-single-content-list-item-content">
                            <?php echo nl2br(esc_html(get_field('recruit-content'))); ?>
                        </dd>
                    </div>

                    <!-- リモート -->
                    <?php
                    $is_remote = get_field('recruit-remote'); ?>
                    <div class="recruit-single-content-list-item">
                        <dt class="recruit-single-content-list-item-title">リモート</dt>
                        <dd class="recruit-single-content-list-item-content">
                            <?php if ($is_remote): ?>
                                リモート可
                            <?php else: ?>
                                リモート不可
                            <?php endif; ?>
                        </dd>
                    </div>
                    <!-- リモート補足 -->
                    <?php if ($is_remote): ?>
                        <div class="recruit-single-content-list-item">
                            <dt class="recruit-single-content-list-item-title">リモート補足</dt>
                            <dd class="recruit-single-content-list-item-content">
                                基本はリモート勤務ですが、出社を希望される方はオフィス勤務も可能です。業務内容やチーム体制に応じて柔軟に対応しています。
                            </dd>
                        </div>
                    <?php endif; ?>

                    <!-- 応募条件（必須） -->
                    <div class="recruit-single-content-list-item">
                        <dt class="recruit-single-content-list-item-title">応募条件（必須）</dt>
                        <dd class="recruit-single-content-list-item-content">
                            <?php echo wpautop(esc_html(get_field('recruit-must'))); ?>
                        </dd>
                    </div>
                    <!-- 応募条件（歓迎） -->
                    <?php if (get_field('recruit-advantage')): ?>
                        <div class="recruit-single-content-list-item">
                            <dt class="recruit-single-content-list-item-title">応募条件（歓迎）</dt>
                            <dd class="recruit-single-content-list-item-content">
                                <?php echo wpautop(esc_html(get_field('recruit-advantage'))); ?>
                            </dd>
                        </div>
                    <?php endif; ?>
                    <!-- 勤務地 -->
                    <div class="recruit-single-content-list-item">
                        <dt class="recruit-single-content-list-item-title">勤務地</dt>
                        <dd class="recruit-single-content-list-item-content">
                            <?php echo esc_html(get_field('recruit-area')); ?>
                        </dd>
                    </div>
                    <!-- 勤務時間 -->
                    <div class="recruit-single-content-list-item">
                        <dt class="recruit-single-content-list-item-title">勤務時間</dt>
                        <dd class="recruit-single-content-list-item-content">
                            <?php echo esc_html(get_field('recruit-time')); ?>
                        </dd>
                    </div>
                    <!-- 給与 -->
                    <div class="recruit-single-content-list-item">
                        <dt class="recruit-single-content-list-item-title">給与</dt>
                        <dd class="recruit-single-content-list-item-content">
                            <?php
                            $recruit_info = get_field('recruit-info', get_the_ID());
                            if ($recruit_info && !empty($recruit_info['recruit-salary'])) {
                                echo esc_html($recruit_info['recruit-salary']);
                            }
                            ?>万円
                        </dd>
                    </div>
                    <!-- 給与形態 -->
                    <div class="recruit-single-content-list-item">
                        <dt class="recruit-single-content-list-item-title">給与形態</dt>
                        <dd class="recruit-single-content-list-item-content">
                            <?php echo esc_html(get_field('recruit-salary-type')); ?>
                        </dd>
                    </div>
                    <!-- 給与補足 -->
                    <?php if (get_field('recruit-salary-supplement')): ?>
                        <div class="recruit-single-content-list-item">
                            <dt class="recruit-single-content-list-item-title">給与補足</dt>
                            <dd class="recruit-single-content-list-item-content">
                                <?php echo wpautop(esc_html(get_field('recruit-salary-supplement'))); ?>
                            </dd>
                        </div>
                    <?php endif; ?>

                    <!-- 休日 -->
                    <div class="recruit-single-content-list-item">
                        <dt class="recruit-single-content-list-item-title">休日</dt>
                        <dd class="recruit-single-content-list-item-content">
                            <?php echo wpautop(esc_html(get_field('recruit-holiday'))); ?>
                        </dd>
                    </div>
                    <!-- 福利厚生 -->
                    <?php if (get_field('recruit-benefit')): ?>
                        <div class="recruit-single-content-list-item">
                            <dt class="recruit-single-content-list-item-title">福利厚生</dt>
                            <dd class="recruit-single-content-list-item-content">
                                <?php echo wpautop(esc_html(get_field('recruit-benefit'))); ?>
                            </dd>
                        </div>
                    <?php endif; ?>
                </dl>
            </article>


            <!-- 会社概要 -->
            <article class="recruit-single-content" id="company-overview">
                <h2 class="recruit-single-content-title">会社概要</h2>
                <?php $company_id = get_field('connected_company');

                if ($company_id):
                    $company_name = get_field('company-name', $company_id);
                    $company_content = get_field('company-content', $company_id);
                    $company_address = get_field('company-address', $company_id);
                    $company_foundation = get_field('company-foundation', $company_id);
                    $company_employee_count = get_field('company-employee-count', $company_id);
                    $company_capital = get_field('company-capital', $company_id);
                    $company_url = get_field('company-url', $company_id);
                ?>
                    <dl class="recruit-single-content-list">
                        <!-- 会社名 -->
                        <div class="recruit-single-content-list-item">
                            <dt class="recruit-single-content-list-item-title">会社名</dt>
                            <dd class="recruit-single-content-list-item-content">
                                <?php echo esc_html($company_name); ?>
                            </dd>
                        </div>
                        <!-- 事業内容 -->
                        <div class="recruit-single-content-list-item">
                            <dt class="recruit-single-content-list-item-title">事業内容</dt>
                            <dd class="recruit-single-content-list-item-content">
                                <?php echo wpautop(esc_html($company_content)); ?>
                            </dd>
                        </div>
                        <!-- 所在地 -->
                        <div class="recruit-single-content-list-item">
                            <dt class="recruit-single-content-list-item-title">所在地</dt>
                            <dd class="recruit-single-content-list-item-content">
                                <?php echo wpautop(esc_html($company_address)); ?>
                            </dd>
                        </div>
                        <!-- 設立 -->
                        <div class="recruit-single-content-list-item">
                            <dt class="recruit-single-content-list-item-title">設立</dt>
                            <dd class="recruit-single-content-list-item-content">
                                <?php echo esc_html($company_foundation); ?>
                            </dd>
                        </div>
                        <!-- 従業員数 -->
                        <div class="recruit-single-content-list-item">
                            <dt class="recruit-single-content-list-item-title">従業員数</dt>
                            <dd class="recruit-single-content-list-item-content">
                                <?php echo esc_html($company_employee_count); ?>
                            </dd>
                        </div>
                        <!-- 資本金 -->
                        <div class="recruit-single-content-list-item">
                            <dt class="recruit-single-content-list-item-title">資本金</dt>
                            <dd class="recruit-single-content-list-item-content">
                                <?php echo esc_html($company_capital); ?>
                            </dd>
                        </div>

                        <!-- 会社のURL -->
                        <?php if (get_field('company-url')): ?>
                            <div class="recruit-single-content-list-item">
                                <dt class="recruit-single-content-list-item-title">会社のURL</dt>
                                <dd class="recruit-single-content-list-item-content">
                                    <?php echo esc_html($company_url); ?>
                                </dd>
                            </div>
                        <?php endif; ?>
                    </dl>
                <?php endif; ?>
            </article>

            <!-- エントリーフォーム -->
            <article class="recruit-single-entry" id="entry-form">
                <h2 class="recruit-single-content-title">エントリーする</h2>
                <!-- contact-form -->
                <?php echo do_shortcode('[contact-form-7 id="4f73341" title="求人フォーム-Craft Job"]'); ?>
            </article>
        </section>

        <!-- 検索フォームコンポーネント -->
        <?php get_template_part('template-parts/search-form'); ?>

    </div>
</div>
<?php get_footer(); ?>