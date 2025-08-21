<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('username')->unique();
                $table->string('email')->unique();
                $table->string('role')->default('admin');
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        } else {
            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users','email')) $table->string('email')->unique()->after('username');
                if (!Schema::hasColumn('users','password')) $table->string('password')->after('role');
                if (!Schema::hasColumn('users','remember_token')) $table->rememberToken();
                if (!Schema::hasColumn('users','created_at')) $table->timestamps();
            });
        }
    }
    public function down(): void { /* لا تسقطي الجدول لو كان موجود */ }
};
