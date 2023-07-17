document.addEventListener('DOMContentLoaded', () => {
    /* SHOW/HIDE POP MESSAGE */
    const showPopup = document.querySelectorAll('#order-item-btn');
    const closePopup = document.querySelector('.popUp__message #close_btn');
    /* POPUP ELEMENTS */
    const popUpMessage = document.querySelector('.popUp__message__container');
    const popUpMessageContent = document.querySelector('.popUp__message');
    const itemname = document.querySelector('.popUp__message .name_price h4');
    const itemprice = document.querySelector(".popUp__message .name_price p");

    /* TEST AREA @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
    const itemid_set = document.querySelector(".popUp__message .name_price #item_id");
    const storeid_set = document.querySelector(".popUp__message .name_price #store_id");
    /* TEST AREA @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */

    /* QUANTITY ELEMENTS */
    const subBtn = document.querySelector('.popUp__item__details .quantity .bi-dash');
    const addBtn = document.querySelector('.popUp__item__details .quantity .bi-plus');
    const itemQuantity = document.querySelector('.popUp__message .popUp__item__details .quantity #text');
    const otherDetailsInput = document.querySelector('.popUp__message .other_details input');
    /* SUMMARY DETAILS (POPUP MESSAGE)*/
    const summaryItemquantity = document.querySelector('.order_summary .summary_item_quantity')
    const summaryItemname = document.querySelector('.order_summary .summary_item_name');
    const otherDetailsValue = document.querySelector('.order_summary .bottom p');
    const totalAmount = document.querySelector('.order_summary .right #total_price')

    // SUCESS AND ERROR MESSAGES
    const successMessage = document.querySelector('.process-status-message .success-message');
    const errorMessage = document.querySelector('.process-status-message .error-message');
    const closeStatMgsBtn = document.querySelectorAll('.process-status-message .close');

    // OPEN THE MODAL
    let itemId = null;
    let storeId = null
    showPopup.forEach(featuredItem => {
        featuredItem.addEventListener('click', () => {
            /* GET DATA FROM FEATURED ITEM */
            const item = featuredItem.querySelector('#item_name').textContent.trim();
            const price = featuredItem.querySelector('#item_price').textContent.trim();
            const image = featuredItem.querySelector('.image').innerHTML;
            const popupImage = document.createElement('div');
            popupImage.innerHTML = image;

            /* TEST AREA @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
            const itemid_get = featuredItem.querySelector('#item_id').textContent.trim();
            const storeid_get = featuredItem.querySelector('#store_id').textContent.trim();
            /* TEST AREA @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */

            /* -- MODAL DATA */
            const quantity = popUpMessageContent.querySelector('.quantity #text').textContent.trim();
            /* POPULATE THE MODAL*/
            itemname.textContent = item;
            summaryItemquantity.querySelector('span').textContent = "\u00A0" + quantity;
            summaryItemname.querySelector('span').textContent = "\u00A0" + item;
            itemprice.querySelector('span').textContent = "\u00A0" + price;
            totalAmount.textContent = price;
            popUpMessage.querySelector('.image').innerHTML = '';
            popUpMessage.querySelector('.image').appendChild(popupImage);

            /* TEST AREA @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
            itemid_set.textContent = itemid_get;
            storeid_set.textContent = storeid_get;
            /* TEST AREA @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */

            itemId = featuredItem.querySelector('#item_id').textContent.trim();
            storeId = featuredItem.querySelector('#store_id').textContent.trim();
            
            /* DISPLAY THE MODAL */
            popUpMessage.style.display = "flex";
            popUpMessage.style.visibility = "visible";

            if (window.innerWidth <= 600) {
                popUpMessageContent.style.transform = 'translateY(0%)';
                popUpMessage.style.opacity = "1";
            }
        })
    })

    // GET CURRENT DATE
    function getCurrentDateTime() {
        const now = new Date();
      
        const year = now.getFullYear();
        const month = padNumber(now.getMonth() + 1); // Months are zero-based
        const day = padNumber(now.getDate());
        const hours = padNumber(now.getHours());
        const minutes = padNumber(now.getMinutes());
        const seconds = padNumber(now.getSeconds());
      
        return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    }
      
    function padNumber(number) {
        return String(number).padStart(2, '0');
    }
          
    // PLACE ORDER FORM
    const placeOrderForm = popUpMessage.querySelector('#place-order-form');

    placeOrderForm.addEventListener('submit', (event) => {
        event.preventDefault();
        
        // Get the summary item name and quantity values
        const itemQuantity = placeOrderForm.querySelector('.order_summary .summary_item_quantity span').textContent.trim();
        const currentDateTime = getCurrentDateTime();

        // Create a new FormData object
        const formData = new FormData(placeOrderForm);

        // Append the summary item name and quantity to the FormData
        formData.append('itemQuantity', itemQuantity);
        formData.append('itemId', itemId);
        formData.append('storeId', storeId);
        formData.append('date', currentDateTime);
        
        console.log(formData);

        // Send the data to the server using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', placeOrderForm.action, true);

        xhr.onload = () => {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    console.log(response.message);
                    errorMessage.style.display = "none";                    
                    successMessage.style.display = "flex";
                    setTimeout(function() {
                        popUpMessage.style.display = "none";
                    }, 300);
                } else {
                    console.log(response.message);
                }
            } else {
                console.log('Error: ' + xhr.status);
                successMessage.style.display = "none";
                errorMessage.style.display = "flex";
                setTimeout(function() {
                    popUpMessage.style.display = "none";
                }, 300);
            }
        };
        xhr.send(formData);
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

    /* CLOSE THE MODAL */
    closePopup.addEventListener('click', () => {
        if (window.innerWidth <= 600) {
            popUpMessageContent.style.transform = 'translateY(100%)';

            setTimeout(() => {
                popUpMessage.style.opacity = "0";
            }, 500);

            setTimeout(() => {
                popUpMessage.style.visibility = "hidden";
            }, 510);
        } else {
            popUpMessage.style.visibility = "hidden";
        }
    })

    /* QUANTITY LOGIC */
    subBtn.addEventListener('click', () => {
        let quantityControl = parseInt(itemQuantity.textContent);
        if (quantityControl > 1) {
            quantityControl--;
            itemQuantity.textContent = quantityControl.toString();
            summaryItemquantity.querySelector('span').textContent = "\u00A0" + quantityControl.toString();
            updateTotalPrice(quantityControl, itemprice.textContent);
        }
    })

    addBtn.addEventListener('click', () => {
        let quantityControl = parseInt(itemQuantity.textContent);
        if (quantityControl < 9) {
            quantityControl++;
            itemQuantity.textContent = quantityControl.toString();
            summaryItemquantity.querySelector('span').textContent = "\u00A0" + quantityControl.toString();
            updateTotalPrice(quantityControl, itemprice.textContent);
        }
    })

    /* CALCULATE TOTAL PRICE */
    function updateTotalPrice(quantity, price) {
        const priceValue = extractNumericValue(price);
        const totalPrice = quantity * priceValue;
        totalAmount.textContent = formatPrice(totalPrice);
    }

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

    /* 'OTHERS' INPUT */
    otherDetailsInput.addEventListener('input', () => {
        const inputValue = otherDetailsInput.value.trim();
        otherDetailsValue.querySelector('span').textContent = inputValue === '' ? 'None' : inputValue; s
    })
});


