<?php

class ConfigTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        # Change the configuration files directory for tests
        if (!defined('PATH_TO_CONFIG_DIR')) {
            define('PATH_TO_CONFIG_DIR', dirname(__FILE__) . '/config/');
        }
    }

    /**
     * @test
     */
    public function it_fetches_all_config_data_from_file()
    {
        $this->assertEquals(array('some_key' => 'some_value'), \Azi\Config::get('sample'));
    }

    /**
     * @test
     */
    public function it_fetches_single_value_form_file()
    {
        $this->assertEquals('some_value', \Azi\Config::get('sample.some_key'));
    }

    /**
     * @test
     */
    public function it_uses_helper_function_to_fetch_data()
    {
        $this->assertEquals('some_value', config('sample.some_key'));
    }

}
