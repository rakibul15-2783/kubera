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
            $table->unsignedBigInteger('project_id');
            $table->string('project_title');
            $table->text('description')->nullable();
            $table->string('project_category'); //another table
            $table->tinyInteger('current_status')->comment('0=planning, 1=processing');
            $table->float('estimate_budget');
            $table->boolean('is_donated'); //->default(false)
            $table->float('donation_amount')->nullable();
            $table->integer('prcentage_of_completion'); ///->default("0")
            $table->string('team_members');
            $table->string('your_role');
            $table->string('document')->nullable();//another table
            $table->timestamps();

            $table->foreign('project_id')
                ->references('id')
                ->on('projects');
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
