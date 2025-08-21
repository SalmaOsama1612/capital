<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('client_name_ar')->nullable();
            $table->string('client_name_en')->nullable();
            $table->string('client_image')->nullable();
            $table->text('comment_ar')->nullable();
            $table->text('comment_en')->nullable();
            $table->unsignedTinyInteger('rate')->default(5); // 1..5
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('reviews'); }
};
