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
    profileContainer.style.transform = profileContainer.style.transform === 'translateX(0%)' ? 'translateX(100%)' : 'translateX(0%)';

    setTimeout(() => {
        popUpProfile.style.opacity = "0";
    }, 500);

    setTimeout(() => {
        popUpProfile.style.visibility = "hidden";
    }, 510);
});
