<?php
namespace Admin\Components;

class Navigation {
    public function render($loggedIn) {
        ?>
        <nav>
            <ul>
                <?php if ($loggedIn): ?>
                    <li><a href="index.php?page=dashboard">Dashboard</a></li>
                    <li><a href="index.php?page=addnewpost">Add New Post</a></li>
                    <li><a href="index.php?page=signout">Logout</a></li>
                <?php else: ?>
                    <li><a href="index.php?page=login">Login</a></li>
                    <li><a href="index.php?page=signup">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    <?php
    }
}
?>