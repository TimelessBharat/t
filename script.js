// Display a dynamic welcome message
document.addEventListener("DOMContentLoaded", function () {
    alert("Welcome to Timeless Bharat! Explore the beauty of India.");
});

// Form Validation for the Search Bar
document.querySelector("form").addEventListener("submit", function (event) {
    let location = document.querySelector("input[placeholder='Where are you going?']").value;
    let checkIn = document.querySelector("input[placeholder='Add Date']").value;
    let checkOut = document.querySelector("input[placeholder='Add Date']").value;
    let guest = document.querySelector("input[placeholder='Add Guest']").value;

    if (location === "" || checkIn === "" || checkOut === "" || guest === "") {
        alert("Please fill in all the fields before submitting.");
        event.preventDefault(); // Prevent form submission if validation fails
    } else {
        alert("Form submitted successfully!");
    }
});

// Change button color on hover dynamically
let button = document.querySelector("button");
button.addEventListener("mouseover", function () {
    this.style.backgroundColor = "gray";
});
button.addEventListener("mouseout", function () {
    this.style.backgroundColor = "orange";
});
