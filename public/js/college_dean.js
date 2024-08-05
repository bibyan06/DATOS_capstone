function showPopupForm() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('popup-form').style.display = 'block';
}

function hidePopupForm() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('popup-form').style.display = 'none';
}

function addAccount() {
    // Collecting input data
    const lastName = document.getElementById('last-name').value;
    const firstName = document.getElementById('first-name').value;
    const middleName = document.getElementById('middle-name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const employeeId = document.getElementById('employee-id').value;

    // For now, we will just log the collected data
    console.log("Account Details:");
    console.log("Last Name:", lastName);
    console.log("First Name:", firstName);
    console.log("Middle Name:", middleName);
    console.log("Email:", email);
    console.log("Password:", password);
    console.log("Employee ID:", employeeId);

    // Here, you would typically send the data to the server, e.g.:
    // fetch('your-server-endpoint', {
    //     method: 'POST',
    //     headers: {
    //         'Content-Type': 'application/json',
    //     },
    //     body: JSON.stringify({ lastName, firstName, middleName, email, password, employeeId }),
    // })
    // .then(response => response.json())
    // .then(data => {
    //     console.log('Success:', data);
    //     // You can add success handling code here
    // })
    // .catch((error) => {
    //     console.error('Error:', error);
    //     // You can add error handling code here
    // });

    // Hiding the popup form after adding the account
    hidePopupForm();
}