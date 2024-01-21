document.addEventListener('DOMContentLoaded', function () {
    const editButton = document.getElementById('editSelected');
    const editSection = document.getElementById('editProductSection');
    const editForm = document.getElementById('editProductForm');

    // Event listener for the edit button
    editButton.addEventListener('click', function () {
        const selectedProduct = document.querySelector('input[name="selectedProduct"]:checked');

        if (selectedProduct) {
            fetchProductDetails(selectedProduct.value);
        } else {
            alert("Please select a product to edit.");
        }
    });

    function fetchProductDetails(productID) {
        fetch(`/api/get?productID=${productID}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
                // Add any necessary headers here, like authorization tokens
            }
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(productDetails => {
                populateEditForm(productDetails);
                editSection.style.display = 'block';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while fetching product details');
            });
    }


    function populateEditForm(details) {
        editForm.innerHTML = `
        <div class='form-group'>
            <label for='productName'>Product Name</label>
            <input type='text' class='form-control' id='productName' name='productName' value='${details.productName}'>
        </div>
        <div class='form-group'>
            <label for='productDescription'>Description</label>
            <textarea class='form-control' id='productDescription' name='productDescription'>${details.productDescription}</textarea>
        </div>
        <div class='form-group'>
            <label for='productPrice'>Price</label>
            <textarea class='form-control' id='productPrice' name='productPrice'>${details.productPrice}</textarea>
        </div>
        <div class='form-group'>
            <label for='productQuantity'>Quantity</label>
            <textarea class='form-control' id='productQuantity' name='productQuantity'>${details.productQuantity}</textarea>
        </div>
        <div class='form-group'>
            <label for='recipeImage'>Image Upload</label>
           <input type="file" id="image" name="image">
        </div>
        <input type='hidden' name='productID' value='${details.productID}'>
        <button type='submit' class='btn btn-primary'>Update product</button> `;
    }

    // Event listener for form submission
    editForm.addEventListener('submit', function (event) {
        event.preventDefault();

        // Prepare the form data for submission
        const formData = new FormData(this);

        fetch('/api/edit', {  // Update this to your actual endpoint for editing recipes
            method: 'POST',
            body: formData  // Send as FormData to handle file uploads
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.text();
            })
            .then(data => {
                console.log(data);
                alert('Product datails updated successfully!');
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the product details');
            });
    });
});
