document.addEventListener('DOMContentLoaded', () => {
    // SUCESS AND ERROR MESSAGES
    const successMessage = document.querySelector('.process-status-message .success-message');
    const errorMessage = document.querySelector('.process-status-message .error-message');
    const closeStatMgsBtn = document.querySelectorAll('.process-status-message .close');

    // CARD CONTAINER
    const orderContainer = document.querySelectorAll('.my_orders');

    orderContainer.forEach((order) => {
        const receiveMyOrderForm = order.querySelector('form#receive-myorder-form');
        const orderIdElement = order.querySelector('#order-id');

        if (receiveMyOrderForm) {
            const orderId = orderIdElement.textContent.trim();
            // RECEIVE MY ORDER
            receiveMyOrderForm.addEventListener('submit', (event) => {
                event.preventDefault();

                // Create a new FormData object
                const formData = new FormData();
                formData.append('orderId', orderId);
                
                // Send the data to the server using AJAX
                const xhr = new XMLHttpRequest();
                xhr.open('POST', receiveMyOrderForm.action, true);

                xhr.onload = () => {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            console.log(response.message);
                            successMessage.querySelector('.texts p').innerHTML = response.message;
                            errorMessage.style.display = "none";                    
                            successMessage.style.display = "flex";
                        } else {
                            console.log(response.message);
                        }
                    } else {
                        console.log('Error: ' + xhr.status);
                        errorMessage.querySelector('.texts p').innerHTML = xhr.status;
                        successMessage.style.display = "none";
                        errorMessage.style.display = "flex";
                    }
                };
                xhr.send(formData);
            });
        }
    });

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


