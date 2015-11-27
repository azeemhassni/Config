<?php

if (!function_exists('config')) {

    /**
     * little helper to get configuration values form config folder
     *
     * @param $key
     * @return mixed
     */
    function config( $key )
    {
        return \Azi\Config::get($key);
    }

}