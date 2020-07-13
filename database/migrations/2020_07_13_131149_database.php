<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Database extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studios', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->timestamps(0);
        });

        Schema::create('actors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->enum('gender', ['female', 'male']);
            $table->timestamps(0);
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->timestamps(0);
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->timestamps(0);
        });

        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200)->unique();
            $table->text('plot');
            $table->foreignId('studio_id')->constrained();
            $table->timestamps(0);
        });

        Schema::create('actor_movie', function (Blueprint $table) {
            $table->foreignId('actor_id')->constrained();
            $table->foreignId('movie_id')->constrained();
        });

        Schema::create('movie_tag', function (Blueprint $table) {
            $table->foreignId('movie_id')->constrained();
            $table->foreignId('tag_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movie_tag');
        Schema::drop('actor_movie');
        Schema::drop('movies');
        Schema::drop('tags');
        Schema::drop('categories');
        Schema::drop('actors');
        Schema::drop('studios');
    }
}
