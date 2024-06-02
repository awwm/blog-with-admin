<?php
    namespace Admin\Components;

    class Header {
        public function render($loggedIn, $username) {?>
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container">
                        <a class="navbar-brand" href="index.php">
                            Admin Panel
                        </a>
                        <?php if ($loggedIn): ?>
                            <div class="d-flex align-items-center">
                                <span class="me-3">Welcome, <?php echo htmlspecialchars($username); ?></span>
                                <a class="btn btn-outline-danger" href="index.php?page=signout">Logout</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </nav>
            </header>
            <?php
        }
    }