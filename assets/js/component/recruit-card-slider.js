export const initializeRecruitCardSlider = () => {
    const sliders = document.querySelectorAll(".js-recruit-card-slider");

    if (!sliders) return;

    sliders.forEach((slider) => {
        new Splide(slider, {
            type: "loop",
            perPage: 3, // スライダーの表示数
            focus: 0,
            pagination: true, // ページネーションを表示
            gap: "10px", // スライダーの間隔
            breakpoints: {
                825: {
                    perPage: 1,
                },
                960: {
                    perPage: 2,
                },
            },
        }).mount();
    });
};
