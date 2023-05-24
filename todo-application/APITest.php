<?php
require_once 'API.php';
use PHPUnit\Framework\TestCase;

class APITest extends TestCase
{
    protected function setUp(): void
    {
        $this->api = new API();
    }


    public function testHttpPost()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';


        $payload = array(
            'first_name' => 'Test',
            'middle_name' => 'test',
            'last_name' => 'last test',
            'contact_number' => 654655
        );
        $result = json_decode($this->api->httpPost($payload), true);
        $this->assertArrayHasKey('status', $result);
        $this->assertEquals($result['status'], 'success');
        $this->assertArrayHasKey('data', $result);
    }

    // public function testPrintName() {
    //     $API = new API.php;
    //     $result = $API->printName("Alixander Lawan");

    //     $this->assertEquals("Alixander Lawan", $result);
    // }
}
