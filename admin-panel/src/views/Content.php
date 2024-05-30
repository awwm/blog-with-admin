<?php
namespace Admin\Views;

class Content {
    public function render($contentInstance) {
        ?>
        <main>
            <div class="container">
                <?php 
                // Check if the provided instance is an object
                if (is_object($contentInstance)) {
                    // Call the render method of the provided instance
                    $contentInstance->render();
                } else {
                    echo "Invalid content";
                }
                ?>
            </div>
        </main>
        <?php
    }
}
?>