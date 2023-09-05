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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('plan_id');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->timestamps();

            $table->foreign('plan_id')
                ->references('id')
                ->on('plans');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
