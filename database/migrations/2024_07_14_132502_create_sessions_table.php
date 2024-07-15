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
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->integer('age');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('home_address');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
