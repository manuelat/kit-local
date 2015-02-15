<?php

/**
 * https://getcomposer.org/doc/04-schema.md
 */
error_reporting(E_ALL);
ini_set('error_reporting', 'on');

define('SYSTEM',    dirname(__DIR__));
define('LAYOUT',    SYSTEM . '/app/layout/');
define('MODULES',   SYSTEM . '/app/modules/');
define('LIBS',      SYSTEM . '/app/libs/');

require_once SYSTEM . '/vendor/autoload.php';

Twig_Autoloader::register();

$directories = array(
    LAYOUT . '/default/',
    LAYOUT . '/views/',
);

$twigData = new TwigData($directories);
$loader = new Twig_Loader_Filesystem($twigData->getDirs());

$twig_config = array();
// enable debug in twig
$twig_config['debug'] = true;

$twig = new Twig_Environment($loader, $twig_config);
$twig->addExtension(new MyTwigExtensions());
$twig->addExtension(new Twig_Extension_Debug());

$twigData->loadScript();

$htmlContent = $twig->render(
    $twigData->getTemplate(),
    $twigData->getOutput()
);

echo $htmlContent;
