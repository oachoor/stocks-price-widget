<?php declare(strict_types=1);

namespace App\Client;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class StockClient
 * @package App\Client
 */
final class StockClient
{
	public const VERSION = 'v3';
	public const URL     = 'https://financialmodelingprep.com';

	/** @var HttpClientInterface */
	protected $httpClient;

	/**
	 * StockClient constructor.
	 */
	public function __construct()
	{
		$this->httpClient = HttpClient::create();
	}

	/**
	 * @return ResponseInterface
	 * @throws TransportExceptionInterface
	 */
	public function getCompanies(): ResponseInterface
	{
		return $this->httpClient->request(Request::METHOD_GET, $this->getUrl('/stock/actives'));
	}

	/**
	 * @param string $symbol
	 *
	 * @return ResponseInterface
	 * @throws TransportExceptionInterface
	 */
	public function getPrice(string $symbol): ResponseInterface
	{
		$url = $this->getUrl(sprintf('/stock/real-time-price/%s', strtoupper($symbol)));
		return $this->httpClient->request(Request::METHOD_GET, $url);
	}

	/**
	 * @param string $route
	 *
	 * @return string
	 */
	private function getUrl(string $route = ''): string
	{
		return sprintf('%s/api/%s/%s', self::URL, self::VERSION, ltrim($route, '/'));
	}
}
