<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('why_choose_us', function (Blueprint $table) {
            $table->id();
            $table->integer('clients_count')->default(0);
            $table->integer('projects_count')->default(0);
            $table->float('success_rate')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('why_choose_us'); }
};
