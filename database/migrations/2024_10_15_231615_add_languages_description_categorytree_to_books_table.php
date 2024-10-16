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
        Schema::table('books', function (Blueprint $table) {
            $table->string('languages')->nullable(); // To store language(s) of the book
            $table->text('description')->nullable();  // To store a description of the book
            $table->json('categoryTree')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('languages');
            $table->dropColumn('description');
            $table->dropColumn('categoryTree');
        });
    }
};
