<?php

error_reporting(E_ALL ^ E_WARNING);

class SiteControllerTest extends CTestCase
{

    protected static $object;

    public static function setUpBeforeClass()
    {
        self::$object = new SiteController(1);
    }

    public static function tearDownAfterClass()
    {
        self::$object = NULL;
    }

    public function testFeedKeyCheck(){
        $this->assertArrayHasKey(90,self::$object->feed_keys());
    }

}