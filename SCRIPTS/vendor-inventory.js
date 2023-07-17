document.addEventListener('DOMContentLoaded', () => {
    // ITEM CARD ELEMENTS
    const itemCard = document.querySelectorAll('.inventory-container .inventory-card');

    // EDIT - EDIT - EDIT - EDIT - EDIT - EDIT - EDIT
    const editModal = document.querySelector('.edit-item-modal');
    const saveEditBtn = editModal.querySelector('.save-btn');
    const cancelEditBtn = editModal.querySelector('.cancel-btn');

    // EDIT MODAL ELEMENTS
    const editImage = editModal.querySelector('.image img');
    const editName = editModal.querySelector('#item-name');
    const editPrice = editModal.querySelector('#item-price');
    const editStock = editModal.querySelector('#item-stock');

    // DELETE - DELETE - DELETE - DELETE - DELETE
    const deleteModal = document.querySelector('.delete-item-modal');
    const deleteBtn = deleteModal.querySelector('.confirm-btn');
    const cancelDeleteBtn = deleteModal.querySelector('.cancel-btn');
    
    // DELETE MODAL ELEMENTS
    const deleteTexts = deleteModal.querySelector('.texts p');

    // ADD - ADD - ADD - ADD - ADD - ADD - ADD - ADD
    const addItemModal = document.querySelector('.add-item-modal');
    const saveAddBtn = addItemModal.querySelector('.save-btn');
    const cancelAddBtn = addItemModal.querySelector('.cancel-btn');
    const openItemBtn = document.querySelector('.add-item-btn');

    let menuId = null;
    itemCard.forEach(item => {
        const openEditModalBtn = item.querySelector('.edit-item-btn');
        openEditModalBtn.addEventListener('click', () => {
            editModal.style.display = "flex";
        });
        
        const openDeleteModalBtn = item.querySelector('.delete-item-btn');
        openDeleteModalBtn.addEventListener('click', () => {
            deleteModal.style.display = "flex";
        })

        item.addEventListener('click', () => {
            // GET DATA FROM THE ITEM CARD
            const itemName = item.querySelector('.item-name').textContent.trim();
            const itemPrice = item.querySelector('.item-price span').textContent.trim();
            const itemStock = item.querySelector('.item-stock span').textContent.trim();
        
            // POPULATE THE EDIT MODAL
            editName.value = itemName;
            editPrice.value = itemPrice;
            editStock.value = itemStock;

            // GET THE ITEM ID
            menuId = item.querySelector('.item-id').textContent.trim();
        
            // DELETE MODAL
            deleteTexts.textContent = `Are you want to delete item ${menuId}: ${itemName}`;
        })
    })
    
    const successMessage = document.querySelector('.process-status-message .success-message');
    const errorMessage = document.querySelector('.process-status-message .error-message');
    const closeStatMgsBtn = document.querySelectorAll('.process-status-message .close');
    
    saveEditBtn.addEventListener('click', () => {
        const xhr = new XMLHttpRequest();
        
        xhr.open('POST', 'controllers/update-vendor-inventory.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        const data = `menuId=${menuId}&itemName=${editName.value}&itemPrice=${editPrice.value}&itemStock=${editStock.value}`;

        xhr.onload = () => {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    successMessage.querySelector('.texts p').innerHTML = response.message;
                    errorMessage.style.display = "none";                    
                    successMessage.style.display = "flex";
                    setTimeout(function() {
                        editModal.style.display = "none";
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
                    editModal.style.display = "none";
                }, 300);
            }
        };
        xhr.send(data);
    })

    /* CLOSE THE EDIT MODAL */
    cancelEditBtn.addEventListener('click', () => { 
        if (window.innerWidth <= 600) {
            itemCard.style.transform = 'translateY(100%)';
            
            setTimeout(() => {
                editModal.style.opacity = "0";
            }, 500);

            setTimeout(() => {
                editModal.style.visibility = "hidden";
            }, 510);
        } else {
            editModal.style.display = "none";
        }
    })

    deleteBtn.addEventListener('click', () => {
        const xhr = new XMLHttpRequest();
        
        xhr.open('POST', 'controllers/delete-vendor-inventory.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        const data = `menuId=${menuId}`;

        xhr.onload = () => {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    successMessage.querySelector('.texts p').innerHTML = response.message;
                    errorMessage.style.display = "none";                    
                    successMessage.style.display = "flex";
                    setTimeout(function() {
                        editModal.style.display = "none";
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
                    editModal.style.display = "none";
                }, 300);
            }
        };
        xhr.send(data);
    })

    // CLOSE THE DELETE MODAL
    cancelDeleteBtn.addEventListener('click', () => { 
        if (window.innerWidth <= 600) {
            itemCard.style.transform = 'translateY(100%)';
            
            setTimeout(() => {
                deleteModal.style.opacity = "0";
            }, 500);

            setTimeout(() => {
                deleteModal.style.visibility = "hidden";
            }, 510);
        } else {
            deleteModal.style.display = "none";
        }
    })
    
    //ADD NEW ITEM
    const addItemForm = document.querySelector('#add-item-form');

    addItemForm.addEventListener('submit', (event) => {
        event.preventDefault();

        const xhr = new XMLHttpRequest();
        xhr.open('POST', addItemForm.action, true);
        
        const data = new FormData(addItemForm);

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
                        addItemModal.style.display = "none";
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
                    editModal.style.display = "none";
                }, 300);
            }
        };
        xhr.send(data); // Send the form data
    })

    // OPEN THE ADD ITEM MODAL
    openItemBtn.addEventListener('click', () => {
        addItemModal.style.display = "flex";
    })
    
    // CLOSE THE ADD ITEM MODAL
    cancelAddBtn.addEventListener('click', () => { 
        if (window.innerWidth <= 600) {
                addItemModal.querySelector('.add-item-container').style.transform = 'translateY(100%)';
            
            setTimeout(() => {
                addItemModal.style.opacity = "0";
            }, 500);

            setTimeout(() => {
                addItemModal.style.visibility = "hidden";
            }, 510);
        } else {
            addItemModal.style.display = "none";
        }
    })

    // Close message
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