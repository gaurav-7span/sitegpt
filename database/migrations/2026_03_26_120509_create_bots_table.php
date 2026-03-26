<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
           $table->string('url');
            $table->string('widget_key')->unique();
            $table->string('avatar')->nullable();
            $table->timestamp('last_trained_at')->nullable();
            $table->timestamps();
            $table->softDeletes();                                                  
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bots');
    }
};
