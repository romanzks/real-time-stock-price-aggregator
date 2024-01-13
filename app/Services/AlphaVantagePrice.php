<?php

declare(strict_types=1);

namespace App\Services;

class AlphaVantagePrice
{
    public function __construct(
        private string $symbol,
        private float $open,
        private float $high,
        private float $low,
        private float $price,
        private int $volume,
        private string $latestTradingDay,
        private float $previousClose,
        private float $change,
        private string $changePercent,
    ) {
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getOpen(): float
    {
        return $this->open;
    }

    public function getHigh(): float
    {
        return $this->high;
    }

    public function getLow(): float
    {
        return $this->low;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getVolume(): int
    {
        return $this->volume;
    }

    public function getLatestTradingDay(): string
    {
        return $this->latestTradingDay;
    }

    public function getPreviousClose(): float
    {
        return $this->previousClose;
    }

    public function getChange(): float
    {
        return $this->change;
    }

    public function getChangePercent(): string
    {
        return $this->changePercent;
    }
}
