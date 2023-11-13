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
        Schema::create('video_games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('imgUrl');
            $table->timestamps();
        });

        Schema::create('video_games_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('video_games_id')->unsigned();
            $table->unsignedBiginteger('users_id')->unsigned();

            $table->foreign('video_games_id')->references('id')
                ->on('video_games')->onDelete('cascade');
            $table->foreign('users_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_games');
    }
};
