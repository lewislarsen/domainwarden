<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('owner_type');
            $table->unsignedBigInteger('owner_id');
            $table->string('number');
            $table->string('currency', 3);
            $table->integer('subtotal');
            $table->integer('tax');
            $table->integer('total');
            $table->integer('balance_before')->default(0);
            $table->integer('credit_used')->default(0);
            $table->integer('total_due');
            $table->unsignedInteger('amount_refunded')->default(0);
            $table->unsignedInteger('amount_charged_back')->default(0);
            $table->string('mollie_payment_id')->nullable();
            $table->string('mollie_payment_status', 16)->nullable();
            $table->datetime('processed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
