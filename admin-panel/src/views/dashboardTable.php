<?php
if (isset($_GET['message']) && $_GET['message'] == 'OK') {
    echo "<div class='alert alert-success'>Post created successfully</div>";
}
?>
<div class="my-3">
    <div class="row">
        <div class="col-md-6">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search posts" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <div class="col-md-6 text-end">
            <a href="index.php?page=addnewpost" class="btn btn-success">Add New Post</a>
        </div>
    </div>
</div>

<?php if (isset($posts) && count($posts) > 0): ?>
    <div class="table-responsive">
        <table id="postsTable" class="table table-striped table-hover">
            <thead class="thead-light">
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
                            <td><?php echo htmlspecialchars($post['author_name']); ?></td>
                        <?php endif; ?>
                        <td><?php echo htmlspecialchars($post['created_at']); ?></td>
                        <td>
                            <a href="index.php?page=editpost&id=<?php echo $post['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="src/assets/js/dashboard.js"></script>
<?php else: ?>
    <p class="alert alert-warning">No posts found.</p>
<?php endif; ?>
