// CHANGE NAVBAR STYLE ON SCROLL
window.addEventListener('scroll', () => {
    document.querySelector('nav').classList.toggle('window-scroll', window.scrollY > 20)
})

var counter = 1;
setInterval(function () {
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if (counter > 5) {
        counter = 1;
    }
}, 5000);

// // Initialize Swiper
// var swiper = new Swiper(".featured_items_container", {
//     slidesPerView: 4.5,
//     spaceBetween: 30,
//     grabCursor: true
// });

// Initialize Swiper
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4.5,
    spaceBetween: 30,
    grabCursor: true
    });

var swiper = new Swiper(".profile-history-container", {
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

// Scroll Effects
AOS.init();


// HOME PAGE AND VENDOR ORDER PAGE //

// CHANGE NAVBAR STYLE ON SCROLL
window.addEventListener('scroll', () => {
    document.querySelector('nav').classList.toggle('window-scroll', window.scrollY > 20)
})

/* SHOW/HIDE POP MESSAGE */
const showPopup = document.querySelectorAll('.card_content');
const closePopup = document.querySelector('#close_btn');
const popUpMessage = document.querySelector('.popUp__message__container');

showPopup.forEach(course => {
    course.addEventListener('click', () => {
        popUpMessage.style.display = "flex";
    })
})

closePopup.addEventListener('click', () => {
    popUpMessage.style.display = "none";
})

/* SHOW PROFILE */
const openProfile = document.querySelector('#profile');
const closeProfile = document.querySelector('.close-profile');
const popUpProfile = document.querySelector('.show-profile');
const profileContainer = document.querySelector('.profile-container');

openProfile.addEventListener('click', () => {
    popUpProfile.style.visibility = "visible";
    popUpProfile.style.opacity = "1";
    profileContainer.style.transform = profileContainer.style.transform === 'translateX(0%)' ? 'translateX(100%)' : 'translateX(0%)';
});

closeProfile.addEventListener('click', () => {
    popUpProfile.style.visibility = "hidden";
    popUpProfile.style.opacity = "0";
    profileContainer.style.transform = profileContainer.style.transform === 'translateX(0%)' ? 'translateX(100%)' : 'translateX(0%)';
});


