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
        Schema::create('images_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable()->default(null);
            $table->string('title_img');
            $table->string('src_img');
            $table->string('description_img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images_project');
    }
};
