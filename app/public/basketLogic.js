 // basketLogic.js
    function addToBasket(productName, productPrice) {
        const basketList = document.getElementById('basketList');
        const listItem = document.createElement('li');
        listItem.classList.add('list-group-item');
        listItem.textContent = `${productName} - ${productPrice}`;

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
        const basketList = document.getElementById('basketList');
            const items = [];

            basketList.querySelectorAll('li').forEach(item => {
                const textContent = item.textContent.split(' - ');
                const productName = textContent[0].trim();
                const productPrice = parseFloat(textContent[1].trim());

                items.push({
                    productName: productName,
                    productPrice: productPrice
                });
            });

        if(items.length === 0) {
            alert('Your basket is empty');
            return;
        }

        fetch('storeBasketItems.php', {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json'
        },
            body: JSON.stringify({ basketItems: items })
        })
        .then(response => {
            if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.text();
        })
        .then(data => {
            window.location.href = '/order';
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while storing basket items');
    });
}
