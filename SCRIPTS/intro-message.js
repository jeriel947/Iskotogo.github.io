const closeIntroMessage = document.querySelector('#close-intro-message');
const introContainer = document.querySelector('.intro-message-container');

setTimeout(function() {
    introContainer.style.display = 'flex';
}, 2000);

closeIntroMessage.addEventListener('click', () => {
    introContainer.style.display = 'none';
})