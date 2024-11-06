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

        Schema::create('wherehouse_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Wherehouse_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->enum('status', ["success","pending","error"]);
            $table->date('register');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wherehouse_products');
    }
};
