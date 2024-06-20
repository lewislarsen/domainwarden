<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliedCouponsTable extends Migration
{
    public function up(): void
    {
        Schema::create('applied_coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('redeemed_coupon_id');
            $table->morphs('model');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applied_coupons');
    }
}
