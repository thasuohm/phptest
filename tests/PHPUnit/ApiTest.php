<?php

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    private $http;

    public function setUp(): void
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => 'http://localhost:3000']);
    }

    public function tearDown(): void
    {
        $this->http = null;
    }

    public function testGetTeamList()
    {
        $response = $this->http->request('GET', '/api/team-list');

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json; charset=utf-8", $contentType , 'wrong content type');

        $data = json_decode($response->getBody());
        $this->assertEquals('dev', $data[0]->id, 'first item is not dev');
    }
}
