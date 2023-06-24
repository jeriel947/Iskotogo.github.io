// CHANGE NAVBAR STYLE ON SCROLL
window.addEventListener('scroll', () => {
    document.querySelector('nav').classList.toggle('window-scroll', window.scrollY > 20)
})

// Wait for the page to load
window.addEventListener('load', function() {
  const loadingOverlay = document.querySelector('.loader-container');
  // Hide the loading overlay
  loadingOverlay.style.display = 'none';
});

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

// Get the heart icon element by its ID
var heartIcon = document.querySelector("#heartIcon");

// Add a click event listener to the heart icon
heartIcon.addEventListener("click", function() {
  // Check if the icon has the "bi-heart" class
    if (heartIcon.classList.contains("bi-heart")) {
      // Remove "bi-heart" and add "bi-heart-fill"
      heartIcon.classList.remove("bi-heart");
      heartIcon.classList.add("bi-heart-fill");
    } else {
      // Remove "bi-heart-fill" and add "bi-heart"
      heartIcon.classList.remove("bi-heart-fill");
      heartIcon.classList.add("bi-heart");
    }
});