<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('content')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->on('users')->references('id');
        });
    }

    public function down(): void
    {
        Schema::table('todos', function(Blueprint $table) {
            $table->dropForeign('user_id');
        });
        Schema::dropIfExists('todo_models');
    }
};
