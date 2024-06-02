<?php
namespace Admin\Views;

class Content {
    public function render($contentInstance) {
        ?>
        <main class="container">
            <?php 
            // Check if the provided instance is an object
            if (is_object($contentInstance)) {
                // Call the render method of the provided instance
                $contentInstance->render();
            } else {
                echo "Invalid content";
            }
            ?>
        </main>
        <?php
    }
}