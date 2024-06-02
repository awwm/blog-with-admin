<?php
    namespace Admin\Components;
    
    class Footer {
        public function render() { ?>
            <footer class="bg-light py-4">
                <div class="container text-center">
                    <p class="mb-0">&copy; <?php echo date("Y"); ?> Admin Panel. All rights reserved.</p>
                </div>
            </footer>
            <?php
        }
    }