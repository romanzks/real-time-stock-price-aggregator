<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Repositories\StockPriceRepository;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    public function index(): JsonResponse
    {
        $companies = Company::all();

        return response()->json($companies);
    }

    public function price(Company $company, StockPriceRepository $stockPriceRepository): JsonResponse
    {
        $stockPrice = $stockPriceRepository->getLatestStockPrice($company);
        $percentageChange = $stockPriceRepository->getPercentageChange($company);

        return response()->json([
            'symbol' => $company->symbol,
            'price' => $stockPrice?->price,
            'change' => $percentageChange,
        ]);
    }
}
