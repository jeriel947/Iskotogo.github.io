const inputElements = document.querySelectorAll('.profile_container .input');
const stallDetailsContainer = document.querySelector('.profile_container .left_profile .profile_details .profile_details_texts');
const stallDetails = document.querySelectorAll('.profile_container .stall_details p');
/* buttons */
const editVendorProfileBtn = document.querySelector('.profile_container .edit-profile-btn');
const saveVendorProfileBtn = document.querySelector('.profile_container .save-profile-btn');
const cancelProfileEditBtn = document.querySelector('.profile_container .cancel-btn');
/* get vendor details */
const storeName = document.querySelector('.profile_container .stall_name input');
const storeLocation = document.querySelector('.profile_container .stall_location input');
const storeContact = document.querySelector('.profile_container .stall_contact input');

editVendorProfileBtn.addEventListener('click', () => {
    inputElements.forEach(input => {
        input.style.display = 'flex';
    });

    stallDetails.forEach(stallDetail => {
        stallDetail.style.display = "none";
    }); 
    stallDetailsContainer.style.gap = "0.5rem";
    saveVendorProfileBtn.removeAttribute('hidden');
    cancelProfileEditBtn.removeAttribute('hidden');
    editVendorProfileBtn.setAttribute('hidden', '');
})

cancelProfileEditBtn.addEventListener('click', () => {
    editVendorProfileBtn.removeAttribute('hidden');
    saveVendorProfileBtn.setAttribute('hidden', '');
    cancelProfileEditBtn.setAttribute('hidden', '');
    inputElements.forEach(input => {
        input.style.display = 'none';
    });

    stallDetails.forEach(stallDetail => {
        stallDetail.style.display = "flex";
    }); 
    stallDetailsContainer.style.gap = "2rem";
})

const successMessage = document.querySelector('.process-status-message .success-message');
const errorMessage = document.querySelector('.process-status-message .error-message');
const closeStatMgsBtn = document.querySelectorAll('.process-status-message .close');

saveVendorProfileBtn.addEventListener('click', () => {
    // Access the values here
    const updatedStoreName = storeName.value;
    const updatedStoreLocation = storeLocation.value;
    const updatedStoreContact = storeContact.value;

    // Create a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();

    // Set up the AJAX request
    xhr.open('POST', 'controllers/update-vendor-details.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Create the data to be sent in the request body
    const data = `storeName=${encodeURIComponent(updatedStoreName)}&storeLocation=${encodeURIComponent(updatedStoreLocation)}&storeContact=${encodeURIComponent(updatedStoreContact)}`;

    // Set up the callback function to handle the response
    xhr.onload = () => {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                console.log(response.message);
                errorMessage.style.display = "none";
                successMessage.querySelector('.texts p').innerHTML = "Your profile has been updated.";
                successMessage.style.display = "flex";
            } else {
                console.log(response.message);
            }
        } else {
            console.log('Error: ' + xhr.status);
            successMessage.style.display = "none";
            errorMessage.querySelector('.texts p').innerHTML = "Failed to update you profile. Please try again.";
            errorMessage.style.display = "flex";
        }
    };

    // Send the AJAX request
    xhr.send(data);

    editVendorProfileBtn.removeAttribute('hidden');
    saveVendorProfileBtn.setAttribute('hidden', '');
    
    inputElements.forEach(input => {
        input.style.display = 'none';
    });

    stallDetails.forEach(stallDetail => {
        stallDetail.style.display = "flex";
    }); 
    stallDetailsContainer.style.gap = "2rem";
})