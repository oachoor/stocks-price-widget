<?php declare(strict_types=1);

namespace App\Controller;

use App\Client\StockClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class BlockController
 * @package App\Controller
 */
class StockController
{
	/** @var StockClient */
	private $client;

	/**
	 * StockController constructor.
	 */
	public function __construct()
	{
		$this->client = new StockClient();
	}

	/**
	 * @return JsonResponse
	 */
	public function index(): JsonResponse
	{
		return new JsonResponse(['status' => Response::HTTP_OK, 'message' => 'Stocks Price Coding Challenge.']);
	}

	/**
	 * @param int $limit
	 *
	 * @return JsonResponse
	 * @throws TransportExceptionInterface
	 * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
	 * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
	 * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
	 * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
	 */
    public function actives(int $limit): JsonResponse
    {
		try {
			$response = $this->client->getCompanies();
			$data = $response->toArray();
		} catch (\Exception $e) {
			$data = [
				'error' => $e->getCode(),
				'message' => $e->getMessage()
			];
		}

		return new JsonResponse($data, Response::HTTP_OK, [
			'Access-Control-Allow-Origin' => '*',
			'Access-Control-Allow-Headers' => '*'
		]);
    }

	/**
	 * @Route("/price/{symbol}")
	 * @param string $symbol
	 *
	 * @return JsonResponse
	 * @throws TransportExceptionInterface
	 * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
	 * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
	 * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
	 * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
	 */
	public function price(string $symbol): JsonResponse
	{
		try {
			$response = $this->client->getPrice($symbol);
			$data = $response->toArray();
		} catch (\Exception $e) {
			$data = [
				'error' => $e->getCode(),
				'message' => $e->getMessage()
			];
		}

		return new JsonResponse($data, Response::HTTP_OK, [
			'Access-Control-Allow-Origin' => '*',
			'Access-Control-Allow-Headers' => '*'
		]);
	}
}
