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
        Schema::disableForeignKeyConstraints();

        Schema::create('log_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Wherehouse_product_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('amount');
            $table->enum('type', ["in","out"]);
            $table->enum('status', ["good","bad"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_products');
    }
};
