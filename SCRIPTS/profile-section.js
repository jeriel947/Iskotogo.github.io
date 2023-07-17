document.addEventListener('DOMContentLoaded', () => {
    var swiperProfile = new Swiper(".profile-history-container", {
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    
    const editImage = document.querySelector('.profile-header-container .edit-user-image');
    const imageContainer = document.querySelector('.profile-header-container .img-holder');
    const successMessage = document.querySelector('.process-status-message .success-message');
    const errorMessage = document.querySelector('.process-status-message .error-message');
    const closeStatMgsBtn = document.querySelectorAll('.process-status-message .close');

    // Add a click event listener to the image container
    editImage.addEventListener('click', () => {
        // Create an input file element
        const imageUpload = document.createElement('input');
        imageUpload.type = 'file';
        imageUpload.accept = 'image/jpeg, image/png';

        // Add a change event listener to the file input element
        imageUpload.addEventListener('change', () => {
            // Get the selected file
            const file = imageUpload.files[0];

            // Create a FormData object to store the file
            const formData = new FormData();
            formData.append('image', file);

            // Send an AJAX request to upload the file
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'controllers/upload-images.php');
            xhr.onload = () => {
                if (xhr.status === 200) {
                    // Update the image container with the newly uploaded image
                    imageContainer.innerHTML = xhr.responseText;
                    errorMessage.style.display = "none";                    
                    successMessage.style.display = "flex";
                } else {
                    // Handle the error case
                    successMessage.style.display = "none";
                    errorMessage.style.display = "flex";
                }
            };
            xhr.send(formData);
        })
        // Trigger a click event on the file input element
        imageUpload.click()
    })


    // EDIT PROFILE - EDIT PROFILE - EDIT PROFILE 
    // GET USER DETAILS
    const profileContainer = document.querySelector('.show-profile .profile-history-container');
    const userName = profileContainer.querySelector('.user-name-container .name').textContent.trim();
    const userSection = profileContainer.querySelector('.user-section-container .name').textContent.trim();
    const studNum = profileContainer.querySelector('.user-studnum-container .name').textContent.trim();
    const userPass = profileContainer.querySelector('.user-pass-container .name').textContent.trim();    
    
    // EDIT USER PROFILE MODAL
    const editUserProfileForm = document.querySelector('#edit-user-profile-form');
    const editUserName = editUserProfileForm.querySelector('#user-name');
    const editUserSection = editUserProfileForm.querySelector('#user-section');
    const editStudNum = editUserProfileForm.querySelector('#stud-number');
    const editUserPass = editUserProfileForm.querySelector('#user-password');

    editUserName.value = userName;
    editUserSection.value = userSection;
    editStudNum.value = studNum;
    editUserPass.value = userPass;

    // OPEN EDIT MODAL
    const openEditModal = document.querySelectorAll('.show-profile .profile-history-container .profile-information-details');
    
    openEditModal.forEach(userDetail => {
        userDetail.addEventListener('click', () => {
            editUserProfileForm.style.transform = "translateX(0)";            
        })
    })

    // EDIT USER PROFILE
    editUserProfileForm.addEventListener('submit', (event) => {
        event.preventDefault();

        const xhr = new XMLHttpRequest();
        xhr.open('POST', editUserProfileForm.action, true);
        
        const data = new FormData(editUserProfileForm);

        xhr.onload = () => {
            // Handle the server response
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    successMessage.querySelector('.texts p').innerHTML = response.message;
                    errorMessage.style.display = "none";                    
                    successMessage.style.display = "flex";
                    setTimeout(function() {
                        editUserProfileForm.style.transform = "translateX(100%)";                                    
                    }, 300);
                } else {
                    errorMessage.querySelector('.texts p').innerHTML = response.message;
                    successMessage.style.display = "none";
                    errorMessage.style.display = "flex";
                }
            } else {
                console.log('Error: ' + xhr.status);
                errorMessage.querySelector('.texts p').innerHTML = xhr.status;                
                successMessage.style.display = "none";
                errorMessage.style.display = "flex";
                setTimeout(function() {
                    editUserProfileForm.style.transform = "translateX(100%)";                                    
                }, 300);
            }
        };
        xhr.send(data); // Send the form data
    })

    // CLOSE EDIT MODAL
    const closeEditModal = editUserProfileForm.querySelector('.cancel-btn');

    closeEditModal.addEventListener('click', () => {
        editUserProfileForm.style.transform = "translateX(100%)";            
    })

    // CLOSE SUCCESS / ERROR MESSAGES
    closeStatMgsBtn.forEach(closeStatBtn => {
        closeStatBtn.addEventListener('click', () => {
            const processStatMgsContainer = closeStatBtn.closest('.process-status-message .update-message');
            processStatMgsContainer.style.display = "none";
            setTimeout(function() {
                location.reload();
            }, 100);
        })
    })
});
