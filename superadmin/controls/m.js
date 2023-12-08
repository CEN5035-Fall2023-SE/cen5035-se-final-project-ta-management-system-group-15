const data = {
    "from_location": "Location A",
    "to_location": "Location B",
    "datetime": "2023-10-30 12:00:00",
    "days": "7", // Replace with the appropriate number of days
    "customer_code": "Customer123",
    "name": "John Doe",
    "number": "1234567890",
    "status": "Pending"
};

fetch('https://wapp.bharathitsolutions.com/jhanavi/controls/api_order_outstation_request.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
})
.then(response => response.json())
.then(data => {
    console.log('Response:', data);
})
.catch(error => {
    console.error('Error:', error);
});
