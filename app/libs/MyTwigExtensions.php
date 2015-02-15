<?php

// http://twig.sensiolabs.org/doc/advanced.html

//use Twig_Extension;
//use Twig_SimpleFunction;
//use Twig_SimpleFilter;

class MyTwigExtensions extends Twig_Extension
{
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'MyTwigExtensions';
    }

    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('nice_url_title', function($text){
                return $text;
            }),
            new Twig_SimpleFilter('truncate', function($string, $num=255){
                $string = substr($string, 0, $num);
                return $string;
            }),
        );
    }

    public function getFunctions()
    {
        return array(
            new Twig_SimpleFilter('p', function($data='', $title=''){
                return Utils::p($data, $title);
            }),
            // generate url
            new Twig_SimpleFunction('myurl', function(){
                $params = func_get_args();
                $pathName = $params[0];
                $parameters = ( isset($params[1]) ) ? $params[1] : array();

                $url = '/' . $pathName;
                if ( ! empty($parameters) ) {
                    $url .= '?' . http_build_query($parameters);
                }

                return $url;
            }),
            // get settings
            new Twig_SimpleFunction('getSettings', function(){
                $params = func_get_args();
                return getSettings($params[0]);
            }, array(
                'is_safe'=>array('html'))
            ),
        );
    }
}
