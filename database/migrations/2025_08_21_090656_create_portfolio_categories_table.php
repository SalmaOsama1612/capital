<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('portfolio_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')->constrained('portfolio')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['portfolio_id','category_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('portfolio_categories'); }
};
