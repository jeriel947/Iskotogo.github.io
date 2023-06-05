document.addEventListener('DOMContentLoaded', () => {
    var swiper;

    function updateSwiperSlidesPerView() {
    if (window.matchMedia("(max-width: 600px)").matches) {
        swiper.params.slidesPerView = 2.5;
        swiper.params.spaceBetween = 15;
    } else {
        swiper.params.slidesPerView = 4.5;
        swiper.params.spaceBetween = 30;            
    }

    swiper.update(); // Update the Swiper instance
    }

    // Initialize the Swiper
    swiper = new Swiper(".featured_items_container", {
        slidesPerView: 4.5,
        spaceBetween: 30,
        grabCursor: true
    });

    // Call the update function on page load
    updateSwiperSlidesPerView();

    // Call the update function on window resize
    window.addEventListener('resize', updateSwiperSlidesPerView);
});
