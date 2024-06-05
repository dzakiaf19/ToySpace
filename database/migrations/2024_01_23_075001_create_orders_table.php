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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->ulid('user_id')->index();
            $table->string('name');
            $table->string('email')->nullable();
            $table->text('address');
            $table->string('phone', 12);

            $table->string('courier');

            $table->string('payment')->default('MIDTRANS');
            $table->string('payment_url')->nullable();

            $table->bigInteger('ongkir_price')->default(0);
            $table->string('no_resi')->nullable();

            $table->bigInteger('total_price')->default(0);
            $table->string('status')->default('PENDING');
            
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
