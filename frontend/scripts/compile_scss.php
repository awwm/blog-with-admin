<?php

require 'vendor/autoload.php';

use ScssPhp\ScssPhp\Compiler;

$scss = new Compiler();
$scss->setImportPaths('frontend/src/assets/css/');
$css = $scss->compile('@import "styles.scss";');

file_put_contents('frontend/src/assets/css/styles.css', $css);

$scss->setImportPaths('admin-panel/src/assets/css/');
$css = $scss->compile('@import "styles.scss";');

file_put_contents('admin-panel/src/assets/css/styles.css', $css);

echo "SCSS compiled successfully.\n";