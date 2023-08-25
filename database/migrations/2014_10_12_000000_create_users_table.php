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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('status')->default(false);
            $table->tinyInteger('role')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('user_verified_request')->default("0")->comment("1=requested");
            $table->tinyInteger('user_verified')->default("0")->comment("1=accept");
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
