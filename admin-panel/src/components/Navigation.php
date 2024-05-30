<?php
    namespace Admin\Components;
    
    class Navigation {
        public function render($loggedIn) {
            if ($loggedIn) {
                ?>
                <nav>
                    <ul>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="posts.php">Posts</a></li>
                        <li><a href="profile.php">Profile</a></li>
                    </ul>
                </nav>
                <?php
            }
        }
    }
?>