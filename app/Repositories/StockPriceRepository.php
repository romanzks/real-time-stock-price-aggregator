<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\StockPriceRepositoryInterface;
use App\Models\Company;
use App\Models\StockPrice;
use App\Services\AlphaVantagePrice;

class StockPriceRepository implements StockPriceRepositoryInterface
{
    public function createStockPrice(AlphaVantagePrice $alphaVantagePrice): StockPrice
    {
        return StockPrice::create([
            'company_id' => Company::firstWhere('symbol', $alphaVantagePrice->getSymbol())->id,
            'open' => $alphaVantagePrice->getOpen(),
            'high' => $alphaVantagePrice->getHigh(),
            'low' => $alphaVantagePrice->getLow(),
            'price' => $alphaVantagePrice->getPrice(),
            'volume' => $alphaVantagePrice->getVolume(),
            'latest_trading_day' => $alphaVantagePrice->getLatestTradingDay(),
            'previous_close' => $alphaVantagePrice->getPreviousClose(),
            'change' => $alphaVantagePrice->getChange(),
            'change_percent' => $alphaVantagePrice->getChangePercent(),
        ]);
    }

    public function getLatestStockPrice(Company $company): ?StockPrice
    {
        return StockPrice::where('company_id', $company->id)->latest()->first();
    }

    public function getPenultimateStockPrice(Company $company): ?StockPrice
    {
        return StockPrice::where('company_id', $company->id)->skip(1)->latest()->first();
    }

    public function getPercentageChange(Company $company): ?float
    {
        if (!$latestStockPrices = $this->getLatestStockPrice($company)?->price) {
            return null;
        }

        if (!$penultimateStockPrices = $this->getPenultimateStockPrice($company)?->price) {
            return null;
        }

        return ($latestStockPrices - $penultimateStockPrices) / $penultimateStockPrices * 100;
    }
}
