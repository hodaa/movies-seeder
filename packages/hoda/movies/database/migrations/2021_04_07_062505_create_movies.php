<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->boolean('adult')->default(0);
            $table->string('backdrop_path')->nullable();
            $table->unsignedBigInteger('third_party_id')->unique();
            $table->integer('popularity');
            $table->string('poster_path')->nullable();
            $table->string('release_date');
            $table->string('title');
            $table->float('vote_average')->default(0);
            $table->integer('vote_count')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
