document.addEventListener('DOMContentLoaded', function() {
    const usernameInput = document.getElementById('username');
    const commentTextarea = document.getElementById('comment');
    const submitButton = document.getElementById('submit-comment');
    const charCount = document.getElementById('char-count');

    // Validate comment length
    commentTextarea.addEventListener('input', function() {
        if (commentTextarea.value.length >= 15) {
            charCount.classList.add('text-green-500');
            charCount.classList.remove('text-blue-900');
            charCount.textContent = 'You have reached the minimum character limit';
        } else {
            charCount.classList.remove('text-green-500');
            charCount.classList.add('text-blue-900');
            charCount.textContent = 'Enter at least 15 characters';
        }
    });

    // Handle form submission
    submitButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default button click behavior

        // Validate input values
        const username = usernameInput.value.trim();
        const comment = commentTextarea.value.trim();
        const postId = new URLSearchParams(window.location.search).get('post_id');

        if (username === '' || comment === '' || comment.length < 15) {
            showToast('Please fill out all fields correctly.', 'error');
            return;
        }

        // Create comment payload
        const commentData = {
            post_id: postId,
            author: username,
            content: comment
        };

        // Post comment to the API
        fetch('http://localhost:8082/create-comment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(commentData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast('Comment submitted successfully!', 'success');
                usernameInput.value = '';
                commentTextarea.value = '';
                charCount.textContent = 'Enter at least 15 characters';
                charCount.classList.remove('text-green-500');
                charCount.classList.add('text-blue-900');
            } else {
                showToast('Failed to submit comment.', 'error');
            }
        })
        .catch(error => {
            console.error('Error submitting comment:', error);
            showToast('An error occurred. Please try again later.', 'error');
        });
    });

    // Function to show Toastify notification
    function showToast(message, type) {
        Toastify({
            text: message,
            duration: 3000,
            close: true,
            gravity: 'top',
            position: 'right',
            backgroundColor: type === 'success' ? '#4CAF50' : '#F44336',
        }).showToast();
    }
});