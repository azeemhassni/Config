<?php
/**
 * Configuration Component
 */

namespace Azi;

/**
 * Class Config
 * require & fetch configuration values
 *
 * @package Azi
 * @author Azi Baloch https://github.com/azeemhassni
 * @author Matthias Kaschubowski https://github.com/golpha
 */
class Config
{
    /**
     * @var string
     */
    static protected $configPath;

    /**
     * @var ConfigNode[]
     */
    static protected $cache = [];

    /**
     * get config values stored in config folder
     *
     * @param $location
     * @param null $default
     * @return mixed
     */
    public static function get($location, $default = null )
    {
        $file = false !== strpos($location, '.') ? strstr($location, '.', true) : $location;

        if ( null === static::$configPath )
        {
            static::$configPath = realpath(getcwd().'/config');
        }
        else
        {
            static::$configPath = realpath(static::$configPath);
        }

        if ( ! static::$configPath )
        {
            throw new \LogicException('Config path does not exists');
        }

        if ( ! is_file(static::$configPath.'/'.$file.'.php') )
        {
            return $default;
        }

        if ( ! array_key_exists(static::$configPath.'/'.$file.'.php', static::$cache) )
        {
            $data = include static::$configPath.'/'.$file.'.php';

            if ( ! is_array($data) )
            {
                throw new \LogicException('Config file must return an array: '.static::$configPath.'/'.$file.'.php');
            }

            static::$cache[static::$configPath.'/'.$file.'.php'] = new ConfigNode($data);
        }

        if ( $location === $file )
        {
            return static::$cache[static::$configPath.'/'.$file.'.php'];
        }

        return static::$cache[static::$configPath.'/'.$file.'.php']->get(ltrim(strstr($location, '.'), '.'), $default);
    }

    /**
     * sets the used config path.
     *
     * @param $path
     */
    public static function setConfigDirectory($path)
    {
        static::$configPath = $path;
    }

}