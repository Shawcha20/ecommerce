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
        Schema::create('buys', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string("product_price");
            $table->integer('product_quantity');
            $table->string('image');
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->integer('user_contact');
            $table->string('user_address');
	        $table->string('status')->default('processing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buys');
    }
};
