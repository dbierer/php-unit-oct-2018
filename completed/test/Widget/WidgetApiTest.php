<?php
namespace CompletedTest\Widget;

/**
 * Makes actual call to API
 * NOTE: such a test is expensive in terms of time and resources!!!
 *
 * For this test to work, the API simulator must be running
 */

// To Run API Simulator:
/*
 * #1: cd /path/to/source/completed/api
 * #2: php -S localhost:8080 index.php
 * #3: from any client: "http://localhost:8080/api/widget/xxx" where "xxx" = the name of the widget
 *
 * Look in /path/to/source/completed/api/data.txt for widgets
 */

use Completed\Widget\WidgetApi;
use PHPUnit\Framework\TestCase;

class WidgetApiTest extends TestCase
{
    protected $api;
    public function setup()
    {
        $this->api = new WidgetApi();
    }
    public function testCallTest()
    {
        // expected row from the API call
        $expected = '{"widget":"test","price":"111.11","date":"2016-12-28 11:11:11"}';
        // make the call
        $response = $this->api->findByName('test');
        $this->assertEquals($expected, $response);
    }
}
