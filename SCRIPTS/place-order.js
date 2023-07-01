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
    const itemid = document.querySelector(".popUp__message .name_price p[name='item_id']");
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
    
    /** OPEN THE MODAL */
    showPopup.forEach(featuredItem => {
        featuredItem.addEventListener('click', () => {
            /* GET DATA FROM FEATURED ITEM */
            const item = featuredItem.querySelector('#item_name').textContent.trim();
            const price = featuredItem.querySelector('#item_price').textContent.trim();
            const image = featuredItem.querySelector('img').src;            
            
            /* TEST AREA @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
            const identification = featuredItem.querySelector('#item_id').textContent.trim();
            /* TEST AREA @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */

            /* -- MODAL DATA */
            const quantity = popUpMessageContent.querySelector('.quantity #text').textContent.trim();
            /* POPULATE THE MODAL*/
            itemname.textContent = item;
            summaryItemquantity.querySelector('span').textContent = "\u00A0" + quantity;
            summaryItemname.querySelector('span').textContent = "\u00A0" + item;        
            itemprice.querySelector('span').textContent = "\u00A0" + price;
            totalAmount.textContent = price;
            popUpMessage.querySelector('.image img').src = image;

            /* TEST AREA @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
            itemid.textContent = identification;
            /* TEST AREA @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ */
            
            /* DISPLAY THE MODAL */
            popUpMessage.style.display = "flex";
            popUpMessage.style.visibility = "visible";
            
            if (window.innerWidth <= 600) {
                popUpMessageContent.style.transform = 'translateY(0%)';
                popUpMessage.style.opacity = "1";        
            }
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
        otherDetailsValue.querySelector('span').textContent = inputValue === '' ? 'None' : inputValue;s
    })    
});