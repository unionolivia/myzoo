<?php

require 'config.php';
require 'utils/Auth.php';

// Use an autoloader if convenient, spl_autoload_register
function __autoload($class) {
    //  Checking if some autoload files don't exist waste resources or memory.
    //  So One may avoid checking for such.
    require LIBS . $class . '.php';
}

$app = new Bootstrap();
$app->init();
?>