<div class="my-3">
    <div class="row">
        <div class="col-12 text-end">
            <a href="index.php?page=addnewpost" class="btn btn-success">Add New Post</a>
        </div>
    </div>
</div>
<?php if (isset($post)): ?>
    <form method="POST" action="" enctype="multipart/form-data" class="my-3">
        <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">

        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" name="title" class="form-control" value="<?php echo htmlspecialchars($post['title']); ?>">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content:</label>
            <textarea id="content" name="content" class="form-control"><?php echo htmlspecialchars($post['content']); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select id="status" name="status" class="form-select">
                <option value="published" <?php echo (isset($post['status']) && $post['status'] === 'published') ? 'selected' : ''; ?>>Published</option>
                <option value="draft" <?php echo (isset($post['status']) && $post['status'] === 'draft') ? 'selected' : ''; ?>>Draft</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="featured_image" class="form-label">Featured Image:</label>
            <input type="file" id="featured_image" name="featured_image" class="form-control" accept="image/*">
            <!-- You can add additional styling or functionality for file input if needed -->
        </div>

        <?php if (!empty($post['featured_image'])): ?>
            <div class="mb-3">
                <label>Featured Image:</label><br>
                <img src="<?php echo $post['featured_image']; ?>" alt="Featured Image" class="img-thumbnail">
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="submit" class="btn btn-danger" name="delete">Delete</button>
        </div>
    </form>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image',
            height: 300, // Set desired height of the editor
            promotion: false
        });
    </script>
<?php endif; ?>