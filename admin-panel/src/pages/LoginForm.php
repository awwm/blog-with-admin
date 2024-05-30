<?php
namespace Admin\Pages;

class LoginForm {
    public function render() {
        ?>
        <section>
            <h2>Login</h2>
            <form id="loginForm">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="index.php?page=signup">Sign up</a></p>
        </section>
        <script src="src/assets/js/login.js"></script>
        <?php
    }
}
?>