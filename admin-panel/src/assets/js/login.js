document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(loginForm);
        const data = Object.fromEntries(formData.entries());

        // Validate form data
        if (!data.username || !data.password) {
            showToast('All fields are required.', 'error');
            return;
        }

        fetch('http://localhost:8082/index.php?endpoint=login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast('Login successful!', 'success');
                localStorage.setItem('token', data.token);
                
                setTimeout(() => {
                    console.log("Token:", data.token);
                    window.location.href = 'index.php?page=dashboard'; // Redirect to dashboard or home page
                }, 2000);
            } else {
                showToast('Login failed: ' + data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('An error occurred during login. Please try again.', 'error');
        });
    });

    function showToast(message, type) {
        Toastify({
            text: message,
            backgroundColor: type === 'error' ? "linear-gradient(to right, #FF5F6D, #FFC371)" : "linear-gradient(to right, #00b09b, #96c93d)",
            duration: 3000
        }).showToast();
    }
});
