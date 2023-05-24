<?php
require_once 'API.php';
use PHPUnit\Framework\TestCase;

class APITest extends TestCase
{
    protected function setUp(): void
    {
        $this->api = new API();
    }

    protected function getData()
    {
        return [
            'first_name' => 'Test',
            'middle_name' => 'test',
            'last_name' => 'last test',
            'contact_number' => 654655
        ];
    }

    public function testHttpPost()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';

        $data = $this->getData();
        $payload = $data;

        $result = json_decode($this->api->httpPost($payload), true);
        $this->assertArrayHasKey('status', $result);
        $this->assertEquals($result['status'], 'success');
        $this->assertArrayHasKey('data', $result);
        
        $data = $result['data'];
        $this->assertArrayHasKey('id', $data);
        $this->assertIsInt($data['id']);
        $this->assertTrue($data['id'] > 0);

        // Check if the inserted data is correct
        $this->assertEquals($data['first_name'], $payload['first_name']);
        $this->assertEquals($data['middle_name'], $payload['middle_name']);
        $this->assertEquals($data['last_name'], $payload['last_name']);
        $this->assertEquals($data['contact_number'], $payload['contact_number']);

        return $result['data']['id'];
    }

    /**
     * @depends testHttpPost
     */
    public function testHttpPut($id)
    {
        $_SERVER['REQUEST_METHOD'] = 'PUT';

        $data = $this->getData();
        $payload = $data;

        $result = json_decode($this->api->httpPut($id,$payload), true);
        $this->assertArrayHasKey('status', $result);
        $this->assertEquals($result['status'], 'success');
        $this->assertArrayHasKey('data', $result);

         // Check if the updated data is correct
         $data = $result['data'];
         $this->assertEquals($data['first_name'], $payload['first_name']);
         $this->assertEquals($data['middle_name'], $payload['middle_name']);
         $this->assertEquals($data['last_name'], $payload['last_name']);
         $this->assertEquals($data['contact_number'], $payload['contact_number']);
    }

    /**
     * @depends testHttpPost
     */
    public function testHttpGet($id)
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';

        $payload = array(
            'id' => $id
        );

        $result = json_decode($this->api->httpGet($payload), true);
        $this->assertArrayHasKey('status', $result);
        $this->assertEquals($result['status'], 'success');
        $this->assertArrayHasKey('data', $result);

        // Check if the retrieved data has correct properties
        $data = $result['data'][0];
        $this->assertArrayHasKey('id', $data);
        $this->assertArrayHasKey('first_name', $data);
        $this->assertArrayHasKey('middle_name', $data);
        $this->assertArrayHasKey('last_name', $data);
        $this->assertArrayHasKey('contact_number', $data);
        
    }

    /**
     * @depends testHttpPost
     */
    public function testHttpDelete($id)
    {
        $_SERVER['REQUEST_METHOD'] = 'DELETE';

        $payload = array(
            'id' => $id
        );
        
        $result = json_decode($this->api->httpDelete($id, $payload), true);
        $this->assertArrayHasKey('status', $result);
        $this->assertEquals($result['status'], 'success');
    }
}
?>