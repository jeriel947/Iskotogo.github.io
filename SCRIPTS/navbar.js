const openNavBtn = document.querySelector('#open_menu_btn');
const closeNavBtn = document.querySelector('#close_menu_btn');
const popUpMobileNav = document.querySelector('.mobile_nav_container');
const mobileNavContainer = document.querySelector('.mobile_nav');

openNavBtn.addEventListener('click', () => {
    popUpMobileNav.style.visibility = "visible";
    popUpMobileNav.style.opacity = "1";
    mobileNavContainer.style.transform = 'translateX(0)';
});

closeNavBtn.addEventListener('click', () => {
    mobileNavContainer.style.transform = 'translateX(-100%)';

    setTimeout(() => {
        popUpMobileNav.style.opacity = "0";
    }, 500);

    setTimeout(() => {
        popUpMobileNav.style.visibility = "hidden";
    }, 510);
});
