<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('author_id');
            $table->foreign('author_id')->references('id')->on('authors')->constrained();
            $table->string('title');
            $table->string('cover');
            $table->integer('year');
            $table->timestamps();


            // $table->unique(['author_id']);
            // $table->foreign('author_id')->references('id')->on('authors')->constrained();
            // UNIQUE('author_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
