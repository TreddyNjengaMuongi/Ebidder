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
        Schema::create('products', function (Blueprint $table) {
            $table->id("product_id");
            $table->string("product_name");
            $table->string("description");
            $table->float("price");
            $table->unsignedBigInteger("subcategory_id");
            $table->foreign("subcategory_id")->references("subcategory_id")->on("subcategory");
            $table->unsignedBigInteger("vendor_id");
            $table->foreign("vendor_id")->references("vendor_id")->on("vendors");
            $table->string("image");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
