<?php

/**
 * https://getcomposer.org/doc/04-schema.md
 */

define('SYSTEM',    dirname(__DIR__));
define('LAYOUT',    SYSTEM . '/app/layout/');
define('MODULES',   SYSTEM . '/app/modules/');
define('LIBS',      SYSTEM . '/app/libs/');
define('CONFIG',    SYSTEM . '/app/config/');
define('LESS',      LAYOUT . '/less/');
define('PUBLIC_DOC',SYSTEM . '/public_html');

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

//$less = new lessc();
//$less->compileFile(LESS . '/style.less', PUBLIC_DOC . '/css/style.css');

$parser = new Less_Parser();
$parser->parseFile( LESS . '/style.less' );
file_put_contents(PUBLIC_DOC . '/css/style.css', $parser->getCss());

echo $htmlContent;
