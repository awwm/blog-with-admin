<?php if (isset($posts) && count($posts) > 0): ?>
    <table id="postsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <?php if ($userRole === 'admin'): ?>
                    <th>Author</th>
                <?php endif; ?>
                <th>Date Posted</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?php echo $post['id']; ?></td>
                    <td><?php echo htmlspecialchars($post['title']); ?></td>
                    <?php if ($userRole === 'admin'): ?>
                        <td><?php echo htmlspecialchars($post['author']); ?></td>
                    <?php endif; ?>
                    <td><?php echo htmlspecialchars($post['created_at']); ?></td>
                    <td><a href="index.php?page=editpost&id=<?php echo $post['id']; ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="src/assets/js/dashboard.js"></script>
<?php else: ?>
    <p>No posts found.</p>
<?php endif; ?>