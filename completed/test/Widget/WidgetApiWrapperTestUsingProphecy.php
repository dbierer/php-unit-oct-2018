<?php
namespace CompletedTest\Widget;

use Completed\Widget\ {WidgetApi, WidgetStorage, WidgetApiWrapper};
use PHPUnit\Framework\TestCase;
use Prophecy\ {Prophet,Argument};
use PDOException;

class WidgetApiWrapperTestUsingProphecy extends TestCase
{

    const API_URL = 'http://localhost:8080';
    const ERROR_EXPECTED_ARRAY = 'ERROR: Expected array not returned';
    const ERROR_EXPECTED_EXCEPTION = 'ERROR: Expected an Exception';

    protected $api;
    protected $storage;
    protected $prophecyApi;
    protected $prophecyStorage;
    protected $wrapper;
    protected $expectedRow;
    protected $expectedJson;

    public function setup()
    {
        // Create expected results
        $this->expectedRow = [
            'widget' => 'grumpy-learning',
            'price' => '100.10',
            'date' => '2016-08-06 14:00:00'
        ];
        $this->expectedJson = json_encode($this->expectedRow);

        // set up "prophecies"
        $prophet = new Prophet();
        $this->prophecyApi = $prophet->prophesize(WidgetApi::class);
        $this->prophecyApi->findByName('test')->willReturn($this->expectedJson);
        $this->prophecyStorage = $prophet->prophesize(WidgetStorage::class);        
        $this->prophecyStorage->save(Argument::any())->willReturn(TRUE);
        
        // create test double for WidgetApi and WidgetStorage
        $this->api = $this->prophecyApi->reveal();
        $this->storage = $this->prophecyStorage->reveal();

        $this->wrapper = new WidgetApiWrapper(self::API_URL, $this->api, $this->storage);
    }

    public function teardown()
    {
        $this->api = NULL;
        $this->storage = NULL;
    }

    public function testRawCall()
    {
        $response = $this->wrapper->rawCallByName('test');
        $this->assertEquals($this->expectedRow, $response, self::ERROR_EXPECTED_ARRAY);
    }

    // NOTE: we are not trying to verify data was saved in the database ...
    //       that is the job of WidgetStorageTest!!!
    public function testCallByName()
    {
        $response = $this->wrapper->callByName('test');
        $this->assertEquals($this->expectedRow, $response, self::ERROR_EXPECTED_ARRAY);
    }

    // NOTE: we are not trying to confirm a database error ...
    //       we are just asserting that if the storage class is unable to save data, an Exception is thrown
    public function testCallByNameThrowsException()
    {
        // override test double for WidgetStorage
        $this->prophecyStorage->save(Argument::any())->willReturn(FALSE);
        $this->storage = $this->prophecyStorage->reveal();
        $this->wrapper = new WidgetApiWrapper(self::API_URL, $this->api, $this->storage);

        $e = NULL;
        try {
            $response = $this->wrapper->callByName('test');
        } catch (PDOException $e) {
            // do nothing
        } catch (Exception $e) {
            // do nothing
        }
        $this->assertInstanceOf(PDOException::class, $e, self::ERROR_EXPECTED_EXCEPTION);
    }
}
