<?php
require_once 'API.php';
use PHPUnit\Framework\TestCase;

class FailAPITest extends TestCase
{
    protected function setUp(): void
    {
        $this->api = new API();
    }

    protected function getData()
    {
        return [
            'id' => 1.2,
            'first_name' => 'Test',
            'middle_name' => 'test',
            'last_name' => 'last test',
            'contact_number' => 654655
        ];
    }

    public function testHttpGetFail()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';

        $data = $this->getData();
        $_GET['id'] = $data['id'];

        $result = json_decode($this->api->httpGet(), true);

        $this->assertArrayHasKey('status', $result);
        $this->assertEquals($result['status'], 'fail');
        $this->assertArrayHasKey('message', $result);
        $this->assertEquals($result['message'], 'Failed to Fetch');
    }

    public function testHttpPutFail()
    {
        $_SERVER['REQUEST_METHOD'] = 'PUT';

        $data = $this->getData();
        $id = $data['id'];
        $payload = $data;

        $result = json_decode($this->api->httpPut($id,$payload), true);
        $this->assertArrayHasKey('status', $result);
        $this->assertEquals($result['status'], 'fail');
        $this->assertArrayHasKey('message', $result);
        $this->assertEquals($result['message'], 'Row does not exist');
    }

    public function testHttpDeleteFail()
    {
        $_SERVER['REQUEST_METHOD'] = 'DELETE';

        $data = $this->getData();
        $id = $data['id'];
        $payload = array('id' => $id);

        $result = json_decode($this->api->httpDelete($id, $payload), true);

        $this->assertArrayHasKey('status', $result);
        $this->assertEquals($result['status'], 'fail');
        $this->assertArrayHasKey('message', $result);
        $this->assertEquals($result['message'], 'One or more rows not found or the provided payload does not match the records');
    }
}
?>