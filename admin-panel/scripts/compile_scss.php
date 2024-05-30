<?php

require_once 'vendor/autoload.php';

use ScssPhp\ScssPhp\Compiler;

// Compile SCSS to CSS
$scss = file_get_contents('src/assets/scss/styles.scss');
$compiler = new Compiler();
$css = $compiler->compileString($scss)->getCss();

// Save compiled CSS to file
file_put_contents('src/assets/css/styles.css', $css);

echo "Admin SCSS compiled successfully!";