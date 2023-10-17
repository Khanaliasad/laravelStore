// Save variantId to local storage
function saveSelectedVariant(variantId) {
    variantId = JSON.stringify(variantId)
    localStorage.setItem('selectedVariant', variantId);
}

// Retrieve variantId from local storage
function getSelectedVariant() {
    return JSON.parse(localStorage.getItem('selectedVariant'));
}

function getSessionId() {
    return localStorage.getItem('sessionId');
}

function getUserId() {
    return localStorage.getItem('userId');
}

function delSelectedVariant() {
    localStorage.removeItem('selectedVariant');
}

// Example: Save selected variantId when handling the size click
function handleSizeClick(element, variantId) {
    // Your existing click handling logic

    // Save the variantId to local storage
    saveSelectedVariant(variantId);
}

// Example: Retrieve and use the selected variantId
function useSelectedVariant() {
    // Retrieve the selected variantId from local storage
    var selectedVariant = getSelectedVariant();

    // Use the selected variantId as needed
    console.log('Selected Variant ID:', selectedVariant);
}

function handleAddToCart(productVarientId,quantity=1) {
    let sessionId = getSessionId();
    let userId = getUserId();
    let varientId = productVarientId ? productVarientId : getSelectedVariant();
    let url = "{{ route('index') }}";
    $.ajax({
        url: '/api/cart/add' + '?session_id=' + sessionId, type: "POST", dataType: 'JSON', data: {
            variant_id: varientId, quantity: quantity
        }, success: function (response) {
            console.log(response)
            updateCart();
            if (response?.message) {
                $.toast({
                    type: "success", autoDismiss: true, message: response?.message
                });
            } else {
                $.toast({
                    type: "error", autoDismiss: true, message: response?.error
                });
            }

        },
    });
}

function getSubtotal(items) {
    let subtotal = 0
    if (!items) return subtotal;
    items?.forEach((elem) => {
        subtotal += parseInt(elem?.quantity) * parseFloat(elem.product.price)
    })
    return parseFloat(subtotal.toFixed(2));
}

function updateCart() {
    let sessionId = getSessionId();
    $.ajax({
        url: '/api/cart/get' + '?session_id=' + sessionId, type: "GET", dataType: 'JSON', success: function (response) {
            // console.log(response);
            console.log(response?.cart[0]?.items);
            subtotal = getSubtotal(response?.cart[0]?.items);
            console.log("subtotal", subtotal);
            // updating subtotal and grand total

            updateNavCartUI(response);
            updateCartUI(response);
        },
    });

}


function increaseValue(button, limit) {
    const numberInput = button.parentElement.querySelector('.number');
    var value = parseInt(numberInput.innerHTML, 10);
    if (isNaN(value)) value = 0;
    if (limit && value >= limit) return;
    handleAddToCart(button?.dataset?.variantid,button?.dataset?.quantity);
    updateCart();
    numberInput.innerHTML = value + 1;
}


function decreaseValue(button) {
    const numberInput = button.parentElement.querySelector('.number');
    var value = parseInt(numberInput.innerHTML, 10);

    if (isNaN(value)) value = 0;
    if (value <= 1) {
        $.toast({
            type: "error", autoDismiss: true, message: "Product quantity cannot be zero"
        });
        return;
    }
    handleAddToCart(button?.dataset?.variantid,button?.dataset?.quantity);
    updateCart()
    numberInput.innerHTML = value - 1;
}

function updateNavCartUI(response) {
    let subtotal = getSubtotal(response?.cart[0]?.items);
    $('#cart_nav li a.cart_li span').text(`Rs ${subtotal}`);

    let firstElement = $('#cart_nav li ul.cart_cont li:first');
    let lastElement = $('#cart_nav li ul.cart_cont li:last');
    let childrenToRemove = $('#cart_nav li ul.cart_cont').children().not(':first').not(':last')
    $('#cart_nav li ul.cart_cont li').remove()
    $('#cart_nav li ul.cart_cont').append(firstElement);

    if (response?.cart[0]?.items == undefined) {
        $('#cart_nav li ul.cart_cont').append(`<li><h4>No item in cart</h4></li>`);
    }

    response?.cart[0]?.items?.forEach(function (elem) {
        $('#cart_nav li ul.cart_cont').append(`<li>
            <a href="/product/${elem.product_id}" class="prev_cart">
                <div class="cart_vert">
                    <img src="${elem?.variant?.images[0]?.image_path}" alt="${elem?.product?.name}" title="${elem?.product?.name}">
                </div>
            </a>
            <div class="cont_cart">
                <h4>${elem?.product?.name}</h4>
                <div class="price">${elem?.quantity} x <span>Rs ${elem?.product?.price}</span></div>
            </div>
            <a title="close" class="close" onclick="removeCartItem(this)"  data-cart-id="${elem.cart_id}" data-cart-item-id="${elem.id}"  data-cartitem="${elem}" ></a>
            <div class="clear"></div>
        </li>`);
    });

    $('#cart_nav li ul.cart_cont').append(lastElement);
}

function updateCartUI(response) {
    let subtotal = getSubtotal(response?.cart[0]?.items);
    $('table.subtotal tr td.price').text(`Rs ${subtotal}`);
    let tableHeader = $('table.cart_product tr:first');
    $('table.cart_product tr').remove();

    $('table.cart_product').append(tableHeader);

    if (response?.cart[0]?.items == undefined) {
        $('.table-container').append(`
        <h2 style="text-align: center">No Item(s) In Cart</h2>
         <div class="clear"></div>
        `);
    }

        response?.cart[0]?.items?.forEach(function (elem) {
        $('table.cart_product').append(`<tr>
            <td class="images">
                <a href="/product/${elem.product_id}">
                    <img src="${elem?.variant?.images[0]?.image_path}" alt="${elem?.product?.name}" title="${elem?.product?.name}">
                </a>
            </td>
            <td class="name">${elem.variant_id} ${elem?.product?.name}</td>
            <td class="name">${elem?.variant?.color}</td>
            <td class="name">${elem?.variant?.size}</td>
            <td class="price">Rs ${elem?.product?.price}</td>
            <td class="qty">
                <div class="quantity-field">
                    <button
                        class="value-button decrease-button"
                        data-variantid="${elem.variant_id}"
                        data-quantity="-1"
                        onclick="decreaseValue(this)"
                        title="Azalt">-</button>
                    <div class="number">${elem?.quantity}</div>
                    <button
                        class="value-button increase-button"
                        data-variantid="${elem.variant_id}"
                        data-quantity="1"
                        onclick="increaseValue(this)"
                        title="Arrtır">+
                    </button>
                </div>
            </td>
            <td class="subtotal">Rs ${(parseFloat(elem?.product?.price) * parseInt(elem?.quantity)).toFixed(2)}</td>
            <td class="close" data-cart-id="${elem.cart_id}" data-cart-item-id="${elem.id}" data-cartitem="${elem}" onclick="removeCartItem(this)" ><a title="close" class="close" data-cart-id="${elem.cart_id}" data-cart-item-id="${elem.id}" data-cartitem="${elem}" ></a></td>
        </tr>`);
    });
}
function removeCartItem(data) {

    console.log($(data).data('cart-id'),$(data).data('cart-item-id'))
    let sessionId = getSessionId();
    $.ajax({
        url: `/api/cart/remove/${$(data).data('cart-id')}/${$(data).data('cart-item-id')}` + '?session_id=' + sessionId, type: "DELETE", dataType: 'JSON', success: function (response) {
            // console.log(response);
            if (response?.error){
                $.toast({
                    type: "error", autoDismiss: true, message: response?.error
                });
            }else {
                $.toast({
                    type: "success", autoDismiss: true, message: response?.message
                });
                updateCart()
            }
        },
    });


}
