document.addEventListener('DOMContentLoaded', function() {
    const cardNumberInput = document.getElementById('cardNumber');
    const searchButton = document.getElementById('press');
    const resultDiv = document.getElementById('result');

    searchButton.addEventListener('click', function() {
        const cardNumber = cardNumberInput.value;
        
        // You can validate the cardNumber here.

        // Send a request to the server (search.php) to retrieve the name.
        fetch('search.php', {
            method: 'POST',
            body: new URLSearchParams({ card_NO: cardNumber }),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                resultDiv.innerHTML = 'Name: ' + data.name;
            } else {
                resultDiv.innerHTML = 'User not found.';
            }
        });
    });
});
