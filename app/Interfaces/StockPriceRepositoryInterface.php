<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\Company;
use App\Models\StockPrice;
use App\Services\AlphaVantagePrice;

interface StockPriceRepositoryInterface
{
    public function createStockPrice(AlphaVantagePrice $alphaVantagePrice): StockPrice;

    public function getLatestStockPrice(Company $company): ?StockPrice;

    public function getPenultimateStockPrice(Company $company): ?StockPrice;

    public function getPercentageChange(Company $company): ?float;
}
