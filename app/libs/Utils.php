<?php

abstract class Utils
{
    public static function inc($path)
    {
        // remove //
        $path = preg_replace('/([\/]+)/', '/', $path);
        // remove ../
        $path = preg_replace('/(\.\.\/)/', '', $path);
        // remove ./
        $path = preg_replace('/(\.\/)/', '', $path);

        return $path;
    }

    public static function p($data='', $title='')
    {
        if ( php_sapi_name() == 'cli' ) {
            if ( $title != '' ) {
                echo $title, "\n";
            }
            echo print_r($data, true);
            echo "\n";
        } else {
            if ( trim($title) !== '' ) {
                printf(
                    '<fieldset><legend>%s</legend><pre>%s</pre></fieldset>',
                    $title,
                    print_r($data, true)
                );
            } else {
                printf('<pre>%s</pre>', print_r($data, true));
            }
        }
    }

    public static function pd($data='', $title='')
    {
        self::p($data, $title);
        die;
    }
}
