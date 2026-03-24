<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/css/vendor/splide-core.min.css" />
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/css/style.css" />

    <!-- js -->
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/js/vendor/splide.min.js" defer></script>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/js/main.js" type="module"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- header -->
    <header class="l-header">
        <div class="l-header-inner l-container-l">
            <<?php echo is_front_page() ? 'h1' : 'p'; ?> class="l-header-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <span class="l-header-logo-image">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo/logo.svg" alt="Craft Job" width="122" height="25">
                    </span>
                    <span class="u-visually-hidden">Craft Job</span>
                </a>
            </<?php echo is_front_page() ? 'h1' : 'p'; ?>>

            <nav class="l-header-nav" aria-label="ヘッダーナビゲーション">
                <ul class="l-header-list">
                    <li class="l-header-item">
                        <a href="<?php echo esc_url(home_url('/recruit')); ?>" class="l-header-item-link">
                            <span class="l-header-item-icon"><img src='<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icon/icon-search.svg' width='30'
                                    height='30' alt='' decoding='async' loading='lazy' /></span>
                            <span class="l-header-item-text">求人を探す</span>
                        </a>
                    </li>
                    <li class="l-header-item">
                        <a href="<?php echo esc_url(home_url('/recruit/ranking')); ?>" class="l-header-item-link">
                            <span class="l-header-item-icon"><img src='<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icon/icon-new.svg' width='30'
                                    height='30' alt='' decoding='async' loading='lazy' /></span>
                            <span class="l-header-item-text">人気求人</span>
                        </a>
                    </li>

                    <li class="l-header-item l-header-item--favorite js-favorite-count" data-count='0'><a href="<?php echo esc_url(home_url('/recruit/favorite')); ?>"
                            class="l-header-item-link">
                            <span class="l-header-item-icon"><img src='<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icon/icon-favorite.svg' width='30'
                                    height='30' alt='' decoding='async' loading='lazy' /></span>
                            <span class="l-header-item-text">お気に入り</span>
                        </a>
                    </li>
                    <li class="l-header-item">
                        <a href="<?php echo esc_url(home_url('/column')); ?>" class="l-header-item-link">
                            <span class="l-header-item-icon"><img src='<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icon/icon-column.svg' width='30'
                                    height='30' alt='' decoding='async' loading='lazy'></span>
                            <span class="l-header-item-text">就活コラム</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main>