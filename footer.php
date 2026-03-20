</main>
<!-- footer -->
<footer class="l-footer">
    <div class="l-footer-wrapper l-container-l">
        <nav class="l-footer-nav" aria-label="フッターナビゲーション">
            <ul class="l-footer-nav-list">
                <li class="l-footer-nav-item">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="l-footer-nav-link l-footer-nav-link--first">ホーム</a>
                </li>
                <li class="l-footer-nav-item">
                    <a href="<?php echo esc_url(home_url('/recruit')); ?>" class="l-footer-nav-link">求人を探す</a>
                </li>
                <li class="l-footer-nav-item">
                    <a href="<?php echo esc_url(home_url('/recruit/ranking')); ?>" class="l-footer-nav-link">人気求人</a>
                </li>
                <li class="l-footer-nav-item">
                    <a href="<?php echo esc_url(home_url('/recruit/favorite')); ?>" class="l-footer-nav-link">お気に入り</a>
                </li>
                <li class="l-footer-nav-item">
                    <a href="<?php echo esc_url(home_url('/column')); ?>" class="l-footer-nav-link">就活コラム</a>
                </li>
                <li class="l-footer-nav-item">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="l-footer-nav-link">お問い合わせ</a>
                </li>
                <li class="l-footer-nav-item">
                    <a href="<?php echo esc_url(home_url('/privacy')); ?>" class="l-footer-nav-link">プライパシーポリシー</a>
                </li>
                <li class="l-footer-nav-item">
                    <a href="<?php echo esc_url('https://www.google.com/search?q=google&oq=google&gs_lcrp=EgZjaHJvbWUqDggBEEUYJxg7GIAEGIoFMgYIABBFGDwyDggBEEUYJxg7GIAEGIoFMgYIAhBFGEEyBggDEEUYPDIGCAQQRRhBMgYIBRBFGDwyBggGEEUYPDIGCAcQRRg80gEIMzM0MWowajSoAgCwAgE&sourceid=chrome&ie=UTF-8'); ?>" class="l-footer-nav-link">運営会社</a>
                </li>
            </ul>
        </nav>
        <p class="l-footer-copyright">
            <small class="l-footer-copyright-text">©2025 Craft Job inc.</small>
        </p>
    </div>
    <!-- フッター固定ナビゲーション -->
    <div class="l-footer-fixed">
        <nav class="l-footer-fixed-nav" aria-label="フッター固定ナビゲーション">
            <ul class="l-footer-fixed-nav-list">
                <li class="l-footer-fixed-nav-item">
                    <a href="<?php echo esc_url(home_url('/recruit')); ?>" class="l-footer-fixed-nav-link">
                        <span class="l-footer-fixed-nav-link-icon">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icon/icon-search.svg" alt="" width="24" height="24"></span>
                        <span class="l-footer-fixed-nav-link-text">求人を探す</span>
                    </a>
                </li>
                <li class="l-footer-fixed-nav-item">
                    <a href="<?php echo esc_url(home_url('/recruit/ranking')); ?>" class="l-footer-fixed-nav-link">
                        <span class="l-footer-fixed-nav-link-icon">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icon/icon-new.svg" alt="" width="24" height="24"></span>
                        <span class="l-footer-fixed-nav-link-text">人気求人</span>
                    </a>
                </li>
                <li class="l-footer-fixed-nav-item">
                    <a href="<?php echo esc_url(home_url('/recruit/favorite')); ?>" class="l-footer-fixed-nav-link">
                        <span class="l-footer-fixed-nav-link-icon l-footer-fixed-nav-link-icon--favorite js-favorite-count"
                            data-count='0'>
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icon/icon-favorite.svg" alt="" width="24" height="24"></span>
                        <span class="l-footer-fixed-nav-link-text">お気に入り</span>
                    </a>
                </li>
                <li class="l-footer-fixed-nav-item">
                    <a href="<?php echo esc_url(home_url('/column')); ?>" class="l-footer-fixed-nav-link">
                        <span class="l-footer-fixed-nav-link-icon">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/icon/icon-column.svg" alt="" width="24" height="24"></span>
                        <span class="l-footer-fixed-nav-link-text">就活コラム</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>