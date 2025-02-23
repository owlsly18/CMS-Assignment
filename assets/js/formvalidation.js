document.getElementById("contact-form").addEventListener("submit", function (event) {
    event.preventDefault();

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const number = document.getElementById("number").value.trim();
    const message = document.getElementById("message").value.trim();
    const honeypot = document.getElementById("honeypot").value; // Anti-spam field

    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;


    if (!name) {
        alert("Please fill your name.");
        return;
    }
    if (!email) {
        alert("Please fill your email.");
        return;
    }
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return;
    }
    if (!message) {
        alert("Please add your message.");
        return;
    }

    if (honeypot !== "") {
        alert("Spam detected");
        return;
    }

    fetch("../assets/php/form_submit.php", {
        method: "POST",
        body: new URLSearchParams({ name, email, number, message })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
    })
    .catch(() => {
        alert("An error occurred.");
    });
});
