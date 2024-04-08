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
        Schema::create('qrcode_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('qr_id')->unsigned()->nullable();
            $table->foreign('qr_id')->references('id')->on('qrcode_details')->onDelete('cascade');
            $table->string('video')->nullable();
            $table->string('video_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qrcode_videos');
    }
};
