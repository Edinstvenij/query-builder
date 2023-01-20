<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\PublishedEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('status')->default(PublishedEnum::UNPUBLISHED->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        if (!app()->isProduction()) {
            Schema::dropIfExists('users');
        }
    }
};
