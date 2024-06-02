<form method="POST" action="" enctype="multipart/form-data" class="my-3">
    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" id="title" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Content:</label>
        <textarea id="content" name="content" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <select id="status" name="status" class="form-select">
            <option value="published" selected>Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="featured_image" class="form-label">Featured Image:</label>
        <input type="file" id="featured_image" name="featured_image" class="form-control" accept="image/*">
        <!-- You can add additional styling or functionality for file input if needed -->
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Create Post</button>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        tinymce.init({
            selector: '#content',
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',
            height: 300, // Set desired height of the editor
            promotion: false
        });
    });
</script>