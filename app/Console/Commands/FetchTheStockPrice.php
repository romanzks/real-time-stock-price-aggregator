<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\Repositories\StockPriceRepository;
use App\Services\AlphaVantageService;
use Illuminate\Console\Command;

class FetchTheStockPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-the-stock-price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the stock price';

    /**
     * Execute the console command.
     */
    public function handle(AlphaVantageService $alphaVantageService, StockPriceRepository $stockPriceRepository)
    {
        $companies = Company::all();

        foreach ($companies as $company) {
            $alphaVantagePrice = $alphaVantageService->getPrice($company->symbol);
            $stockPriceRepository->createStockPrice($alphaVantagePrice);
        }
    }
}
