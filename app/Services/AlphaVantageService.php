<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class AlphaVantageService
{
    private const BASE_URI = 'https://www.alphavantage.co/query';
    private const TIMEOUT_SECONDS = 60;
    private const RETRY_TIMES = 6;
    private const RETRY_TIMEOUT_MILLISECONDS = 1000;
    private const SLEEP_SECONDS = 10;

    public function __construct()
    {
        Http::macro('alphaVantage', function () {
            return Http::baseUrl(AlphaVantageService::BASE_URI)
                ->withQueryParameters(['apikey' => env('ALPHA_VANTAGE_API_KEY')])
                ->retry(AlphaVantageService::RETRY_TIMES, AlphaVantageService::RETRY_TIMEOUT_MILLISECONDS)
                ->timeout(AlphaVantageService::TIMEOUT_SECONDS)
                ->connectTimeout(AlphaVantageService::TIMEOUT_SECONDS)
                ->throw(function (\Illuminate\Http\Client\Response $r) {
                    if ($r->status() === Response::HTTP_TOO_MANY_REQUESTS) {
                        sleep(AlphaVantageService::SLEEP_SECONDS);
                    }
                });
        });
    }

    public function getPrice(string $symbol): ?AlphaVantagePrice
    {
        $data = Http::alphaVantage()->get('', [
            'function' => 'GLOBAL_QUOTE',
            'symbol' => $symbol,
        ])->json('Global Quote');

        return new AlphaVantagePrice(
            (string) $data['01. symbol'],
            (float) $data['02. open'],
            (float) $data['03. high'],
            (float) $data['04. low'],
            (float) $data['05. price'],
            (int) $data['06. volume'],
            (string) $data['07. latest trading day'],
            (float) $data['08. previous close'],
            (float) $data['09. change'],
            (string) $data['10. change percent'],
        );
    }
}
