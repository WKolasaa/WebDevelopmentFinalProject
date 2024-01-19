async function addProduct() {
    const formData = new FormData(document.getElementById('productForm'));

    try {
        const response = await fetch('/api/add', {
            method: 'POST',
            body: formData // directly use formData
        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }
        alert('Product added successfully');
        document.getElementById('productForm').reset();
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
    }

}

