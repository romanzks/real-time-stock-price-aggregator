<?php

use App\Models\Company;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('stock_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class);
            $table->decimal('open', 8, 4);
            $table->decimal('high', 8, 4);
            $table->decimal('low', 8, 4);
            $table->decimal('price', 8, 4);
            $table->bigInteger('volume');
            $table->date('latest_trading_day');
            $table->decimal('previous_close', 8, 4);
            $table->decimal('change', 8, 4);
            $table->string('change_percent');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_prices');
    }
};
