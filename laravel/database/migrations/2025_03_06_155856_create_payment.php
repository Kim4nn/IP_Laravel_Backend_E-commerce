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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->timestamp('payment_date');
            $table->string('payment_method', length: 100);
            $table->decimal('amount', total: 10, places: 2);
            $table->integer('order_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('order');
            $table->foreign('customer_id')->references('id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
