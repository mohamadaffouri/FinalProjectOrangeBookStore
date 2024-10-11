<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign(['order_id']); // If it's a foreign key, drop the constraint first
            $table->dropColumn('order_id'); // Then drop the column itself
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
           // Optionally, if you want to revert this migration, add back the column
           $table->unsignedBigInteger('order_id')->nullable();

           // If it was a foreign key, add the foreign key constraint back
           $table->foreign('order_id')->references('id')->on('orders')->onDelete('set null');
        });
    }
};
