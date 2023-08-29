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
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('project_title');
            $table->text('description');
            $table->string('project_category');
            $table->tinyInteger('current_status')->comment('0=planning, 1=processing');
            $table->float('estimate_budget');
            $table->boolean('is_donated');
            $table->float('donation_amount')->nullable();
            $table->integer('prcentage_of_completion');
            $table->string('team_members');
            $table->string('your_role');
            $table->string('document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_details');
    }
};
