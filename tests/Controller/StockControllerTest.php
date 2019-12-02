<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class StockControllerTest
 * @package App\Tests
 */
class StockControllerTest extends WebTestCase
{
	public function testListStocks()
	{
		$client = new HttpBrowser();
		$client->request('GET', '/stock/actives');

		$response = $client->getResponse();
		$this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
	}

	public function testWrongRoute()
	{
		$client = new HttpBrowser();
		$client->request('GET', '/stock/inactives');

		$response = $client->getResponse();
		$this->assertEquals(Response::HTTP_NOT_FOUND, $response->getStatusCode());
	}
}
