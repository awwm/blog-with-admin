<?php if (isset($post)): ?>
    <form method="POST" action="">
        <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>"><br>

        <label for="content">Content:</label><br>
        <textarea id="content" name="content"><?php echo htmlspecialchars($post['content']); ?></textarea><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="published" <?php echo (isset($post['status']) && $post['status'] === 'published') ? 'selected' : ''; ?>>Published</option>
            <option value="draft" <?php echo (isset($post['status']) && $post['status'] === 'draft') ? 'selected' : ''; ?>>Draft</option>
        </select><br>

        <input type="submit" value="Save">
        <button type="submit" name="delete">Delete</button>
    </form>
<?php endif; ?>