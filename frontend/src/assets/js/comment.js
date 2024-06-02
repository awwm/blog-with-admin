document.addEventListener('DOMContentLoaded', function() {
    const usernameInput = document.getElementById('username');
    const commentTextarea = document.getElementById('comment');
    const submitButton = document.getElementById('submit-comment');
    const charCount = document.getElementById('char-count');
    const commentsContainer = document.getElementById('comments-container');

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

    // Function to fetch and display comments
    function fetchAndDisplayComments(postId) {
        fetch(`http://localhost:8082/get-post-comments/${postId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(comments => {
                commentsContainer.innerHTML = ''; // Clear existing comments
                if (comments.length === 0) {
                    const noCommentsElement = document.createElement('p');
                    noCommentsElement.classList.add('text-gray-700', 'italic');
                    noCommentsElement.textContent = 'No comments yet.';
                    commentsContainer.appendChild(noCommentsElement);
                } else {
                    comments.forEach(comment => {
                        const commentElement = document.createElement('article');
                        commentElement.classList.add('bg-white', 'rounded-lg', 'text-base', 'p-6', 'dark:bg-gray-900', 'shadow-md', 'mb-3');
                        commentElement.innerHTML = `
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center w-full justify-between">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                                            class="mr-2 w-6 h-6 rounded-full"
                                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                            alt="${comment.author}">${comment.content}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="${comment.created_at}"
                                            title="${comment.created_at}">${comment.created_at}</time>
                                    </p>
                                </div>                                
                            </footer>
                            <p class="text-gray-500 dark:text-gray-400">${comment.author}.</p>
                            <div class="flex items-center mt-4 space-x-4">
                            </div>
                        `;
                        commentsContainer.appendChild(commentElement);
                    });
                }
            })
            .catch(error => {
                console.error('Error fetching comments:', error);
                showToast('Failed to fetch comments. Please try again later.', 'error');
            });
    }

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
                fetchAndDisplayComments(postId); // Fetch and display comments after submission
            } else {
                showToast('Failed to submit comment.', 'error');
            }
        })
        .catch(error => {
            console.error('Error submitting comment:', error);
            showToast('An error occurred. Please try again later.', 'error');
        });
    });

    // Initial fetch of comments when page loads
    const postId = new URLSearchParams(window.location.search).get('post_id');
    fetchAndDisplayComments(postId);
});
