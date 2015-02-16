<?php

$examples = array(
    array('users', 'profile'),
    array('users', 'register'),
    array('users', 'login'),
    array('articles', 'index'),
    array('articles', 'details'),
    array('order', 'list'),
    array('order', 'checkout'),
);

ob_start();
show_source(__DIR__ . '/ex.php');
$php_code = ob_get_clean();

return array(
    'examples' => $examples,
    'php_code' => $php_code,
);
