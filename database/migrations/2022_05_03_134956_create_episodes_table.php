<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('title', 60);
            $table->string('description', 2000);
            $table->boolean('hidden')->default(false);
            $table->timestamps();
            $table->date('released_at');
            $table->string('filename');
            $table->foreignId('podcast_id')->constrained();
            $table->unique(['number', 'podcast_id']);
            $table->unique(['title', 'podcast_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
};
