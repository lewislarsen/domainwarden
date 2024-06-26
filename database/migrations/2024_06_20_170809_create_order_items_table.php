<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('process_at');
            $table->string('orderable_type')->nullable();
            $table->unsignedBigInteger('orderable_id')->nullable();
            $table->string('owner_type');
            $table->unsignedBigInteger('owner_id');
            $table->string('description');
            $table->text('description_extra_lines')->nullable();
            $table->string('currency', 3);
            $table->unsignedInteger('quantity')->default(1);
            $table->integer('unit_price');
            $table->decimal('tax_percentage', 6, 4);
            $table->unsignedBigInteger('order_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
}
