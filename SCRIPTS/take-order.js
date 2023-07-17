document.addEventListener('DOMContentLoaded', () => {
    /* SHOW/HIDE POP MESSAGE */
    const showOrder = document.querySelectorAll('.active_order_container .active_order');
    const closeOrder = document.querySelector('.take-order-container .cancel-btn');

    /* POPUP ELEMENTS */
    const takeOrderContainer = document.querySelector('.take-order-container');
    const takeOrderCard = document.querySelector('.take-order-card');
    const itemname = document.querySelector('.take-order-card .item-name-price h4');
    const itemBasePrice = document.querySelector(".take-order-card .item-name-price .base-price p");
    const itemQuantity = document.querySelector('.take-order-card .order-details .order-quantity p');
    const otherDetails = document.querySelector('.take-order-card .order-details .order-others p');
    const totalAmount = document.querySelector('.take-order-card .order-details .order-total p');
    /* CUSTOMER ELEMENTS */
    const customerName = document.querySelector('.take-order-card .customer-details .customer-name');
    
    /* TAKE ORDER BUTTON */
    const receiveOrderBtn = document.querySelector('.take-order-container .take-order-btn');
    
    let orderId = null;
    let menuId = null;
    /** OPEN THE MODAL */
    showOrder.forEach(activeOrder => {
        activeOrder.addEventListener('click', () => {
            /* GET DATA FROM ACTIVE ORDERS */
            const item = activeOrder.querySelector('.item-name').textContent.trim();
            const total = activeOrder.querySelector('.total-price .item-total-price').textContent.trim();
            const orderPrice = activeOrder.querySelector('.total-price .base-price').textContent.trim();
            const orderQuantity = activeOrder.querySelector('.total-price .order-quantity').textContent.trim();
            const orderCustName = activeOrder.querySelector('.customer .customer-name').textContent.trim();
            const itemImage = activeOrder.querySelector('.order-image').innerHTML;               
            const popupImage = document.createElement('div');
            popupImage.innerHTML = itemImage;
            const customerImage = activeOrder.querySelector('.customer .image').innerHTML;
            const customerImageContainer = document.createElement('div');
            customerImageContainer.innerHTML = customerImage;
            
            /* POPULATE THE MODAL*/
            itemname.textContent = item;
            itemBasePrice.textContent = "Php" + " " + orderPrice + ".00";
            itemQuantity.textContent = orderQuantity;
            totalAmount.textContent = "Php" + " " + total + ".00";
            otherDetails.textContent = "None";
            takeOrderContainer.querySelector('.image').innerHTML = '';
            takeOrderContainer.querySelector('.image').appendChild(popupImage);
            customerName.textContent = orderCustName;
            takeOrderContainer.querySelector('.customer-details .image').innerHTML = '';
            takeOrderContainer.querySelector('.customer-details .image').appendChild(customerImageContainer);
            
            orderId = activeOrder.querySelector('.order-id').textContent.trim();
            menuId = activeOrder.querySelector('.menu-id').textContent.trim();
            
            /* DISPLAY THE MODAL */
            takeOrderContainer.style.display = "flex";
            takeOrderContainer.style.visibility = "visible";
            
            if (window.innerWidth <= 600) {
                takeOrderCard.style.transform = 'translateY(0%)';
                takeOrderContainer.style.opacity = "1";        
            }
        })
    })

    /* CLOSE THE MODAL */
    closeOrder.addEventListener('click', () => { 
        if (window.innerWidth <= 600) {
            takeOrderCard.style.transform = 'translateY(100%)';
            
            setTimeout(() => {
                takeOrderContainer.style.opacity = "0";
            }, 500);

            setTimeout(() => {
                takeOrderContainer.style.visibility = "hidden";
            }, 510);
        } else {
            takeOrderContainer.style.display = "none";
        }
    })

    const successMessage = document.querySelector('.process-status-message .success-message');
    const errorMessage = document.querySelector('.process-status-message .error-message');
    const closeStatMgsBtn = document.querySelectorAll('.process-status-message .close');

    /* RECEIVE ORDER  */
    receiveOrderBtn.addEventListener('click', () => {
        // Create a new XMLHttpRequest object
        const xhr = new XMLHttpRequest();
        
        // Set up the AJAX request
        xhr.open('POST', 'controllers/receive-order.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        // Create the data to be sent in the request body
        const data = `orderId=${orderId}&menuId=${menuId}`;
        // Set up the callback function to handle the response
        xhr.onload = () => {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    successMessage.querySelector('.texts p').innerHTML = response.message;
                    errorMessage.style.display = "none";                    
                    successMessage.style.display = "flex";
                    setTimeout(function() {
                        takeOrderContainer.style.display = "none";
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
                    takeOrderContainer.style.display = "none";
                }, 300);
            }
        };
        xhr.send(data);
    })

    /* Close message */
    closeStatMgsBtn.forEach(closeStatBtn => {
        closeStatBtn.addEventListener('click', () => {
            const processStatMgsContainer = closeStatBtn.closest('.process-status-message .update-message');
            processStatMgsContainer.style.display = "none";
            setTimeout(function() {
                location.reload();
            }, 100);
        })
    })

    /* REMOVE CURRENCY SIGNS BEFORE CALCULATING */
    function extractNumericValue(price) {
        const numericRegex = /\d+(\.\d+)?/g;
        const matches = price.match(numericRegex);
        if (matches && matches.length > 0) {
            return parseFloat(matches[0]);
        }
        return 0;
    }

    /* FORMAT DISPLAY FOR TOTAL PRICE */
    function formatPrice(price) {
        return 'P ' + price.toFixed(2);
    } 
});