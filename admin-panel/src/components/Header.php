<?php
    namespace Admin\Components;

    class Header {
        public function render($loggedIn, $username) {
            ?>
            <header>
                <div class="logo">Admin Panel</div>
                <div class="user-info">
                    <?php if ($loggedIn): ?>
                        <span>Welcome, <?php echo $username; ?></span>
                        <a href="logout.php">Logout</a>
                    <?php endif; ?>
                </div>
            </header>
            <?php
        }
    }
?>