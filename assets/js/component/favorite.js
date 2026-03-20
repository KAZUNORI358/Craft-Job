export const initializeFavorite = () => {
    const STORAGE_KEY = "favorite_recruit_ids"; // 保存用のキー名
    const favoriteButtons = document.querySelectorAll(".js-favorite-button");
    const favoriteCounts = document.querySelectorAll(".js-favorite-count");

    // ローカルストレージ取得を1箇所に集約
    const getFavorites = () => {
        try {
            const saved = localStorage.getItem(STORAGE_KEY);
            if (!saved) return [];

            const parsed = JSON.parse(saved);

            // 配列であることを確認し、さらに "undefined" などのゴミを除去
            if (Array.isArray(parsed)) {
                return parsed.filter(
                    (id) =>
                        id && id !== "undefined" && String(id).trim() !== "",
                );
            }
        } catch (e) {
            return [];
        }
    };

    /**
     * バッジの数字（data-count）を更新
     * CSS側で [data-count="0"] の非表示制御をしているため属性更新のみ行う
     */
    const updateFavoriteCount = () => {
        const count = getFavorites().length;
        favoriteCounts.forEach((el) => {
            el.setAttribute("data-count", count);
        });
    };

    // --- 1. 同期（リダイレクト）処理 ---
    // お気に入りページ（/recruit/favorite）にいる時だけ実行
    if (window.location.pathname.includes("recruit/favorite")) {
        const savedIds = JSON.parse(localStorage.getItem(STORAGE_KEY) || "[]");
        const urlParams = new URLSearchParams(window.location.search);
        const urlIdsString = urlParams.get("ids") || "";
        const urlIds = urlIdsString
            ? urlIdsString.split(",").filter(Boolean)
            : [];

        // URLのIDとLocalStorageのIDが一致しているかチェック
        const isMatched =
            savedIds.length === urlIds.length &&
            savedIds.every((id) => urlIds.includes(String(id)));

        if (!isMatched) {
            if (savedIds.length > 0) {
                urlParams.set("ids", savedIds.join(","));
                window.location.search = urlParams.toString(); // リロード
                return; // リロードされるので以降の処理は不要
            } else if (urlIds.length > 0) {
                window.location.href = window.location.pathname; // IDが空ならパラメータなしへ
                return;
            }
        }
    }

    // --- 2. 初期表示の更新 ---
    updateFavoriteCount();

    const updateButtonState = (btn, id) => {
        const favorites = getFavorites();
        if (favorites.includes(String(id))) {
            btn.classList.add("is-active");
        } else {
            btn.classList.remove("is-active");
        }
    };

    favoriteButtons.forEach((btn) => {
        const id = btn.dataset.id;
        updateButtonState(btn, id);

        btn.addEventListener("click", () => {
            let favorites = getFavorites();
            const index = favorites.indexOf(String(id));

            if (index > -1) {
                favorites.splice(index, 1);
            } else {
                favorites.push(String(id));
            }

            localStorage.setItem(STORAGE_KEY, JSON.stringify(favorites));
            updateButtonState(btn, id);
            updateFavoriteCount();
        });
    });
};
