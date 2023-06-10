// CHANGE NAVBAR STYLE ON SCROLL
window.addEventListener('scroll', () => {
    document.querySelector('nav').classList.toggle('window-scroll', window.scrollY > 20)
})

// GO BACK TO THE PREVIOUS PAGE
document.querySelector('#back-to-prev').addEventListener('click', function() {
    history.back(); 
});