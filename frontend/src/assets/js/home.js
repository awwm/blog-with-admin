// Function to fetch recent posts and display them on the home page
function fetchRecentPosts() {
    fetch('http://localhost:8082/posts')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(posts => {
            const recentPostsElement = document.getElementById('recent-posts');
            posts.forEach(post => {
                const postElement = document.createElement('article');
                postElement.classList.add('masonry-item', 'p-4');
                // Construct the initial HTML for the post
                let postHTML = `
                <div class="bg-white p-4 rounded shadow">
                `;

                // Add the featured image only if it exists
                if (post.featured_image) {
                postHTML += `<figure class="flex items-center mb-6"><img src="http://localhost:8081${post.featured_image}" alt="Featured Image" class="rounded-lg w-full" /></figure>`;
                }

                // Continue with the rest of the post HTML
                postHTML += `
                <div class="block">
                <h4 class="text-gray-900 font-medium leading-8 mb-9">${post.title}</h4>
                <div class="flex items-center justify-between  font-medium">
                <h6 class="text-sm text-gray-500">By ${post.author_name}</h6>
                <a href="single-post.html?post_id=${post.id}" class="text-md text-blue-500 font-bold">Read More</a>
                </div></div>
                `;

                // Set the innerHTML of the post element
                postElement.innerHTML = postHTML;
                recentPostsElement.appendChild(postElement);
            });
            showToast('Recent posts fetched successfully!', 'success');
        })
        .catch(error => {
            console.error('Error fetching recent posts:', error);
            showToast('Failed to fetch recent posts. Please try again later.', 'error');
        });
}

// Call the fetchRecentPosts function when the DOM is loaded
document.addEventListener('DOMContentLoaded', fetchRecentPosts);

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
