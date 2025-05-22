function addToCart(itemName, itemPrice, itemImage) {
    var cartList = document.querySelector('.listCart');
    var itemHTML = `
        <div class="item">
            <div class="image">
                <img src="${itemImage}" alt="${itemName}">
            </div>
            <div class="name">${itemName}</div>
            <div class="totalPrice">${itemPrice}</div>
            <div class="quantity">
                <span class="minus" onclick="decrementQuantity(this, '${itemPrice}')">-</span>
                <span class="quantity-value" style="font-size: 12px;">1</span>
                <span class="plus" onclick="incrementQuantity(this, '${itemPrice}')">+</span>
                <button class="removeBtn" onclick="removeFromCart(this)" style="background-color: rgb(59, 16, 99); border: none;">X</button>
            </div>
        </div>
    `;
    cartList.insertAdjacentHTML('beforeend', itemHTML);
    updateTotalPrice();
}

function incrementQuantity(element, itemPrice) {
    var quantityElement = element.parentNode.querySelector('.quantity-value');
    var currentQuantity = parseInt(quantityElement.textContent);
    quantityElement.textContent = currentQuantity + 1;
    updateTotalPrice();
}

function decrementQuantity(element, itemPrice) {
    var quantityElement = element.parentNode.querySelector('.quantity-value');
    var currentQuantity = parseInt(quantityElement.textContent);
    if (currentQuantity > 1) {
        quantityElement.textContent = currentQuantity - 1;
        updateTotalPrice();
    }
}

function updateTotalPrice() {
    var totalPrice = 0;
    var items = document.querySelectorAll('.item');
    items.forEach(function(item) {
        var itemPrice = item.querySelector('.totalPrice').textContent;
        totalPrice += parseFloat(itemPrice.replace('$', '')) * parseInt(item.querySelector('.quantity-value').textContent);
    });
    document.getElementById('totalPrice').textContent = '$' + totalPrice.toFixed(2);
}

function removeFromCart(button) {
    var item = button.closest('.item');
    item.remove();
    updateTotalPrice();
}
