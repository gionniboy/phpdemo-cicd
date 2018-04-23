<?php
/**
 * PHP version 7
 * API functional tests class
 */

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

/**
 * Class ApiTest
 *
 * @package Cineboard\Tests
 */
class ApiUsersTest extends TestCase
{
    /**
     * @beforeClass
     */
    public function client()
    {
        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            'cookies' => true,
            array(
                'request.options' => array(
                    'exceptions' => false,
                ))
            ]);
            return $client;
    }


    /**
     * @test
     **/
    public function getAllHeaders()
    {
        $client=$this->client();
        $response = $client->get('/users', [
            'headers'  => [],
            'debug' => true]
        );

        $this->assertTrue($response->hasHeader('Access-Control-Allow-Origin'));
        $this->assertTrue($response->hasHeader('Access-Control-Allow-Headers'));
        $this->assertTrue($response->hasHeader('Access-Control-Allow-Methods'));
    }

    /**
     * @test
     **/
    public function getAllUsers()
    {
        $client=$this->client();
        $response = $client->get('/users', [
            'headers'  => [],
            'debug' => true]
        );

        $this->assertTrue($response->hasHeader('Access-Control-Allow-Methods'));

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @test
     **/
    public function postUsers()
    {
        $data = array(
            'name' => 'phpUnit',
        );

        $client=$this->client();
        $response = $client->post('/users', [
            'headers'  => [],
            'debug' => true,
            'form_params' => $data
        ]);

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @test
     **/
    public function deleteUsers()
    {
        $client=$this->client();
        $response = $client->delete('/users/5', [
            'headers'  => [],
            'debug' => true
        ]);

        $this->assertEquals(200, $response->getStatusCode());
    }
}