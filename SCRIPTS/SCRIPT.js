// CHANGE NAVBAR STYLE ON SCROLL
window.addEventListener('scroll', () => {
    document.querySelector('nav').classList.toggle('window-scroll', window.scrollY > 20)
})

// GO BACK TO THE PREVIOUS PAGE
// document.querySelector('#back-to-prev').addEventListener('click', function() {
//     history.back(); 
// });

document.querySelector('.prev-page-btn').addEventListener('click', function() {
    history.back(); 
});

// LOGOUT FUNCTION
function performLogout() {
    window.location.href = "LoginPage.php";
}