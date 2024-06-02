
document.addEventListener('DOMContentLoaded', function() {
    // Get post ID from URL query parameters
    const queryParams = new URLSearchParams(window.location.search);
    const postId = queryParams.get('post_id');

    // Fetch single post data from API
    fetch(`http://localhost:8082/get-post/${postId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(post => {
            // Display post data on the page
            const postContainer = document.getElementById('post-container');
            // Construct the HTML for the post
            let postHTML = `
            <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 relative">
                <div class="bg-cover bg-center text-center overflow-hidden"
                    style="min-height: 500px; background-image: url('http://localhost:8081${post.featured_image}')"
                    title="Woman holding a mug">
                </div>
                <div class="max-w-3xl mx-auto">
                    <div
                        class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                        <div class="bg-white relative top-0 -mt-32 p-5 sm:p-10">
                            <h1 href="#" class="text-gray-900 font-bold text-3xl mb-2">${post.title}</h1>
                            <p class="text-gray-700 text-xs mt-2">Written By:
                                <a href="#"
                                    class="text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                                    ${post.author_name}
                                </a> 
                            <p class="text-base leading-8 my-5">
                            ${post.content}
                            </p>

                        </div>

                    </div>
                </div>
            </div>
            `;

            // Close the post div
            postHTML += `</div>`;
            // Set the innerHTML of the post container
            postContainer.innerHTML = postHTML;
        })
        .catch(error => console.error('Error fetching single post:', error));
});