<?php
namespace Admin\Pages;

class SignupForm {
    public function render() {
        ?>
        <section>
            <h2>Sign Up</h2>
            <form id="signupForm">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="editor">Editor</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit">Sign Up</button>
            </form>
            <p>Already have an account? <a href="index.php?page=login">Log in</a></p>
        </section>
        <script src="src/assets/js/signup.js"></script>
        <?php
    }
}
?>
