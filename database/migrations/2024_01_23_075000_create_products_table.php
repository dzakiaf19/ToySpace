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
            $table->ulid('id')->primary();
            $table->string('name');
            $table->text('desc');
            $table->decimal('price', 10, 0);
            $table->integer('stock');
            $table->integer('berat');
            $table->unsignedBigInteger('cat_id');
            $table->string('slug');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cat_id')->references('id')->on('categories');

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
