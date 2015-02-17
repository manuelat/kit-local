<?php

use Symfony\Component\Yaml\Yaml;

require_once dirname(dirname(__DIR__)) . '/app/config/config.php';

class WorkingPagesTest extends PHPUnit_Framework_TestCase
{
    protected function getPageContent($pathName)
    {
        global $directories;

        $routes = Yaml::parse(file_get_contents(CONFIG . '/routes.yml'));

        $route = SdkRouter::getInstance();
        $route->registerRoutes($routes);

        $twigData = new TwigData($directories);
        $twigData->setForcedPath(
            $route->generate($pathName)
        );


        ob_start();
        require PUBLIC_DOC . '/index.php';
        print_r($twigData);
        die;

        return ob_get_clean();
    }

    public function test_Title()
    {
        $content = $this->getPageContent('homepage');

        echo $content;

        $this->assertNotContains('error', $content);

    }
}
