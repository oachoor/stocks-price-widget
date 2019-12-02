<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => '_', 'limit' => 10, '_controller' => 'App\\Controller\\StockController:index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/stock/(?'
                    .'|actives(?:/(\\d+))?(*:35)'
                    .'|price/([^/]++)(*:56)'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_stock_actives_limit', 'limit' => 10, '_controller' => 'App\\Controller\\StockController:actives'], ['limit'], null, null, false, true, null]],
        56 => [
            [['_route' => '_stock_price_symbol', 'limit' => 10, '_controller' => 'App\\Controller\\StockController:price'], ['symbol'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
