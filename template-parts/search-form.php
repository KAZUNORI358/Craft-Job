<!-- 絞り込み検索 -->
<details class="c-search-form js-accordion">
    <summary class="c-search-form-summary js-summary">
        絞り込み検索
        <span class="c-search-form-summary-icon">
            <span></span>
            <span></span>
        </span>
    </summary>
    <!-- c-search-form-content -->
    <div class="c-search-form-content js-content">
        <form action="<?php echo esc_url(home_url('/recruit')); ?>" method="get" class="c-search-form-content-form">

            <input type="hidden" name="s" value="">
            <!-- 地域 -->
            <div class="c-search-form-content-form-item">
                <label for="area-top"
                    class="c-search-form-content-item-label c-search-form-content-item-label--area">地域</label>
                <div class="c-search-form-content-form-item-select-wrapper">
                    <select name="area" id="area-top" class="c-search-form-content-form-item-select">
                        <option disabled selected value="">選択してください</option>
                        <?php
                        $areas = get_terms([
                            'taxonomy' => 'area',
                            'hide_empty' => false,
                        ]);
                        if ($areas):
                            foreach ($areas as $area):
                        ?>
                                <option value="<?php echo esc_attr($area->slug); ?>" <?php selected(isset($_GET['area']) && $_GET['area'] ===  $area->slug, true); ?>><?php echo esc_html($area->name); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <!-- 雇用形態 -->
            <div class="c-search-form-content-form-item">
                <label for="role-top"
                    class="c-search-form-content-item-label c-search-form-content-item-label--role">雇用形態</label>
                <div class="c-search-form-content-form-item-select-wrapper">
                    <select name="role" id="role-top"
                        class="c-search-form-content-form-item-select">
                        <option disabled selected value="">選択してください</option>
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
            <div class="c-search-form-content-form-item">
                <label for="occupation-top"
                    class="c-search-form-content-item-label c-search-form-content-item-label--occupation">職種</label>
                <div class="c-search-form-content-form-item-select-wrapper">
                    <select name="occupation" id="occupation-top" class="c-search-form-content-form-item-select">
                        <option disabled selected value="">選択してください</option>
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
            <!-- 年収 -->
            <div class="c-search-form-content-form-item">
                <label
                    class="c-search-form-content-item-label c-search-form-content-item-label--salary"><span
                        class="c-search-form-content-item-label-text">年収<span
                            class="c-search-form-content-item-label-text-unit">(単位：万円)</span></span></label>
                <div class="c-search-form-content-form-item-input-wrapper">
                    <input type="number" name="min-salary" id="min-salary-top"
                        class="c-search-form-content-form-item-input" placeholder="例：300" value="<?php echo isset($_GET['min-salary']) ? $_GET['min-salary'] : ''; ?>">
                    <span class="c-search-form-content-form-item-input-separator">~</span>
                    <input type="number" name="max-salary" id="max-salary-top"
                        class="c-search-form-content-form-item-input" placeholder="例：500" value="<?php echo isset($_GET['max-salary']) ? $_GET['max-salary'] : ''; ?>">
                </div>
            </div>
            <div class="c-search-form-content-form-item">
                <button type="submit" class="c-search-form-content-form-button">検索する</button>
            </div>
        </form>
    </div>
</details>