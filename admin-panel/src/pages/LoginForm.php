<?php
    namespace Admin\Pages;

    class LoginForm {
        public function render() {
            ?>
            <section>
                <h2>Login</h2>
                <form action="login.php" method="post">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            </section>
            <?php
        }
    }
?>