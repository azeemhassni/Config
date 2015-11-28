<?php
/**
 * Created by PhpStorm.
 * User: nihylum
 * Date: 28.11.15
 * Time: 15:37
 */

namespace Azi;


/**
 * Class ConfigNode
 *
 * @package Azi
 * @author Matthias Kaschubowski https://github.com/golpha
 */
class ConfigNode
{
    /**
     * @var mixed[]|ConfigNode[]
     */
    protected $items = [];

    /**
     * Constructor
     *
     * Resolves the given array as ConfigNodes.
     *
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = array_map(function($in) {
            return is_array($in) ? new ConfigNode($in) : $in;
        }, $items);
    }

    /**
     * returns the value for the given location. If the given location does not exists the $default value will be
     * returned. If the given location is an array, a ConfigNode instance will be returned.
     *
     * @param $location
     * @param null $default
     * @return ConfigNode|mixed
     */
    public function get($location, $default = null)
    {
        $deeperItem = strstr($location, '.');

        if ( ! $deeperItem )
        {
            if ( array_key_exists($location, $this->items) )
            {
                return $this->items[$location];
            }

            return $default;
        }

        if ( ! array_key_exists($deeperItem, $this->items) )
        {
            return $default;
        }

        if ( ! $this->items[$deeperItem] instanceof self )
        {
            throw new \LogicException('targeted sub-node points to a node that is not a node: '.$deeperItem);
        }

        return $this->items[$deeperItem]->get(ltrim(strstr($location, '.'), '.'), $default);
    }

    /**
     * @return array
     */
    public function asArray()
    {
        return array_map(function($in) {
            return $in instanceof ConfigNode ? $in->asArray() : $in;
        }, $this->items);
    }
}