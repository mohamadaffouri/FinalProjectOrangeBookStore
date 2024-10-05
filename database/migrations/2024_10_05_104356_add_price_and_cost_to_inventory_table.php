<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceAndCostToInventoryTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('inventory', function (Blueprint $table) {
            // Add the price and cost columns
            $table->decimal('price', 8, 2)->after('status'); // Add 'price' column after 'status'
            $table->decimal('cost', 8, 2)->after('price'); // Add 'cost' column after 'price'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory', function (Blueprint $table) {
            // Remove the columns if the migration is rolled back
            $table->dropColumn('price');
            $table->dropColumn('cost');
        });
    }
}
