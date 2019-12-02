# Stocks Price Challenge

Restful API to fetch stocks price based on Financialmodelingprep.

## Requirements
- PHP >= 7.3
- Composer >= 1.9.x
- Node.js >= 10.x
- Yarn >= 1.19.x

## Installation

1. `git clone https://github.com/oachoor/stocks-price-widget.git && cd stocks-price-widget` (Skip for zipped)

2. `composer install`

3. `cd public && yarn install`

## Usage

Run the following commands:
```
php -S localhost:8000
cd public yarn start
```

## The Task

To make a live widget on a page with current stocks prices of most active companies on the market. A widget should include:

- a name of a company
- a current price
- a time of an update

Every 10 seconds the widget should show a different company stocks price (random choice).

The backend solution should include at least one class with chosen OOP pattern (this choice should be justified). The code should include tests. Any Composer packages could be used.

Get a list of tickers of companies could get from this API URL - https://financialmodelingprep.com/developer/docs#Most-Active-Stock-Companies
A current price of stocks could get from this API URL - https://financialmodelingprep.com/developer/docs#Stock-Price.

# Tests

`composer test`
