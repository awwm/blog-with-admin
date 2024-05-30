<?php
    namespace Admin\Components;
    
    class Footer {
        public function render() {
            ?>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Admin Panel. All rights reserved.</p>
            </footer>
            <?php
        }
    }
?>