document.addEventListener("DOMContentLoaded", function() {
    const signupForm = document.getElementById('signupForm');

    signupForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(signupForm);
        const data = Object.fromEntries(formData.entries());

        // Validate form data
        if (!data.username || !data.email || !data.password || !data.role) {
            showToast('All fields are required.', 'error');
            return;
        }

        if (!validateEmail(data.email)) {
            showToast('Invalid email format.', 'error');
            return;
        }

        fetch('http://localhost:8082/index.php?endpoint=signup', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast('Signup successful! Please log in.', 'success');
                setTimeout(() => {
                    window.location.href = 'index.php?page=login';
                }, 2000);
            } else {
                showToast('Signup failed: ' + data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('An error occurred during signup. Please try again.', 'error');
        });
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function showToast(message, type) {
        Toastify({
            text: message,
            backgroundColor: type === 'error' ? "linear-gradient(to right, #FF5F6D, #FFC371)" : "linear-gradient(to right, #00b09b, #96c93d)",
            duration: 3000
        }).showToast();
    }
});
