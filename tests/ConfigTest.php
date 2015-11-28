<?php

class ConfigTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        \Azi\Config::setConfigDirectory(__DIR__.'/config');
    }

    /**
     * @test
     */
    public function it_fetches_all_config_data_from_file()
    {
        $this->assertInstanceOf('Azi\\ConfigNode', \Azi\Config::get('sample'));
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
    public function it_fetches_node_values_from_file()
    {
        $this->assertInstanceOf('Azi\\ConfigNode', \Azi\Config::get('sample.some_array'));
    }

    /**
     * @test
     */
    public function invalid_file()
    {
        $this->assertNull(\Azi\Config::get('foo'));
    }

    /**
     * @test
     */
    public function array_values()
    {
        $this->assertArrayHasKey('foo', \Azi\Config::get('sample.some_array')->asArray());
    }

    /**
     * @test
     */
    public function it_uses_helper_function_to_fetch_data()
    {
        $this->assertEquals('some_value', config('sample.some_key'));
    }

}
