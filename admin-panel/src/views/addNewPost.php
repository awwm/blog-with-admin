<form method="POST" action="">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" required><br>

    <label for="content">Content:</label><br>
    <textarea id="content" name="content" required></textarea><br>

    <label for="status">Status:</label><br>
    <select id="status" name="status">
        <option value="published">Published</option>
        <option value="draft">Draft</option>
    </select><br>

    <input type="submit" value="Create Post">
</form>