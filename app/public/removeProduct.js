document.addEventListener('DOMContentLoaded', function () {
    const removeProductForm = document.getElementById('removeProductForm');
    removeProductForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const selectedProductID = Array.from(this.querySelectorAll('input[name="selectedProducts[]"]:checked')).map(input => input.value);
        if (selectedProductID.length > 0) {
            if (confirm('Are you sure you want to delete these recipes?')) {
                deleteProduct(selectedProductID);
            }
        } else {
            alert('Please select at least one recipe before deleting.');
        }
    });

    // Your existing JavaScript code for deleteRecipe function and attaching delete event listeners
    function attachDeleteEventListeners() {
        const deleteButtons = document.querySelectorAll('.delete-product-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const productID = this.dataset.productID;
                if (confirm('Are you sure you want to delete this recipe?')) {
                    removeProducts(productID);
                }
            });
        });
    }

    function deleteProduct(selectedProductID) {
        fetch(`/api/delete?productID=${selectedProductID}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                // Add any necessary headers here, like authorization tokens
            }
        })
            .then(response => {
                if (response.status === 204) {
                    alert('Product removed successfully');
                    location.reload(); // Refresh the page to update the list of recipes
                } else if (response.status === 404) {
                    alert('Product not found');
                } else {
                    alert('Error removing product');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while removing the product');
            });
    }

    // Call the function to attach delete event listeners when the page loads
    attachDeleteEventListeners();

    // Function to delete multiple recipes
    function removeProducts(productsID) {
        productsID.forEach(productID => {
            removeProduct(productID);
        });
    }
});