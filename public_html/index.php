<?php

/**
 * https://getcomposer.org/doc/04-schema.md
 */

require_once dirname(__DIR__) . '/app/config/config.php';
require_once SYSTEM . '/vendor/autoload.php';

Twig_Autoloader::register();

$directories = array(
    LAYOUT . '/default/',
    LAYOUT . '/views/',
);

use Symfony\Component\Yaml\Yaml;

$routes = Yaml::parse(file_get_contents(CONFIG . '/routes.yml'));

$route = SdkRouter::getInstance();
$route->registerRoutes($routes);

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

if ( php_sapi_name() != 'cli' ) {
    $parser = new Less_Parser();
    $parser->parseFile(LESS . '/style.less');
    file_put_contents(PUBLIC_DOC . '/css/style.css', $parser->getCss());
}

echo $htmlContent;
