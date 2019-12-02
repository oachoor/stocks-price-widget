<?php declare(strict_types=1);

namespace App;

use App\Controller\StockController;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

/**
 * Class Kernel
 * @package App
 */
class Kernel extends BaseKernel
{
	use MicroKernelTrait;

	/**
	 * @return array|iterable|\Symfony\Component\HttpKernel\Bundle\BundleInterface[]
	 */
	public function registerBundles()
	{
		return [
			new FrameworkBundle()
		];
	}

	/**
	 * @param ContainerBuilder $c
	 * @param LoaderInterface  $loader
	 */
	protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
	{
		$c->loadFromExtension('framework', [
			'secret' => 'ac7121ddc36b778d5a931e93d58693d95beff7b5'
		]);
	}

	/**
	 * @param RouteCollectionBuilder $routes
	 */
	protected function configureRoutes(RouteCollectionBuilder $routes)
	{
		$routes->add('/', StockController::class . ':index');
		$routes->add('/stock/actives/{limit}', StockController::class . ':actives');
		$routes->add('/stock/price/{symbol}', StockController::class . ':price');
		$routes->setRequirement('limit', '\d+');
		$routes->setDefault('limit', 5);
	}
}
