async function addOrder() {
    const formData = new FormData(document.getElementById('orderForm'));

    try {
        const response = await fetch('/api/payment', {
            method: 'POST',
            body: formData // directly use formData
        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }
        alert('Order processed successfully');
        //document.getElementById('orderForm').reset();
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
    }

}

