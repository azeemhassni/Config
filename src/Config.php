<?php namespace Azi;

/**
 * Class Config
 * require & fetch configuration values
 *
 * @package Azi
 */
class Config
{

    /**
     * get config values stored in config folder
     *
     * @param $location
     * @param null $default
     * @return mixed
     */
    public static function get( $location, $default = null )
    {
        $values = explode('.', $location);

        $fileName = $values[ 0 ];
        unset( $values[ 0 ] );

        if (!defined('PATH_TO_CONFIG_DIR')) {
            define('PATH_TO_CONFIG_DIR', dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/config/");
        }


        $filePath = PATH_TO_CONFIG_DIR . $fileName . ".php";
        if (!file_exists($filePath)) {
            return $default;
        }

        $config = require $filePath;


        foreach ($values as $value) {
            $config = $config[ $value ];
        }

        if (!$config && $default) {
            $config = $default;
        }

        return $config;
    }

}