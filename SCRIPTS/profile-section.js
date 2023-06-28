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
                    successMessage.querySelector('.texts p').textContent = "Image updated successfully.";        
                    errorMessage.style.display = "none";                    
                    successMessage.style.display = "flex";
                } else {
                    // Handle the error case
                    errorMessage.querySelector('.texts p').textContent = "Error uploading image. Please try again.";        
                    successMessage.style.display = "none";
                    errorMessage.style.display = "flex";
                }
            };
            xhr.send(formData);
        })

        // Trigger a click event on the file input element
        imageUpload.click()

    })

    /* Close message */
    closeStatMgsBtn.forEach(closeStatBtn => {
        closeStatBtn.addEventListener('click', () => {
            const processStatMgsContainer = closeStatBtn.closest('.process-status-message .update-message');
            processStatMgsContainer.style.display = "none";
        })
    })
});
