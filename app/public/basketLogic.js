// basketLogic.js
function addToBasket(productName, productPrice) {
    const basketList = document.getElementById('basketList');
    const listItem = document.createElement('li');
    listItem.classList.add('list-group-item');
    listItem.textContent = `${productName} - ${productPrice}`;

    // Add a remove button to each item
    const removeButton = document.createElement('button');
    removeButton.textContent = 'Remove';
    removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'float-right', 'ml-2');
    removeButton.onclick = function() {
        listItem.remove();
    };

    listItem.appendChild(removeButton);
    basketList.appendChild(listItem);
}

function finalizeOrder() {
    // Implement logic to finalize the order
    // For example, redirect to the order page
    window.location.href = '/order';
}
