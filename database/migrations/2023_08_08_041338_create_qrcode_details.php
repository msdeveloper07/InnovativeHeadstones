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
        Schema::create('qrcode_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('label');
            $table->string('first_name');
            $table->string('last_name');
            $table->longText('biography')->nullable();
            $table->unsignedBigInteger('user_plan_id')->unsigned()->nullable();
            $table->foreign('user_plan_id')->references('id')->on('users_plan')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('audio_id')->unsigned()->nullable();
            $table->foreign('audio_id')->references('id')->on('qraudios')->onDelete('cascade');
            $table->string('profile_image')->nullable();
            $table->string('bg_image')->nullable();
            $table->enum('is_new', ['new', 'existing'])->default('new');
            // $table->integer('audio_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qrcode_details');
    }
};
