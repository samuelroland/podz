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
            $table->string('title', 60);
            $table->integer('number');
            $table->boolean('hidden')->default(false);
            $table->timestamps();
            $table->date('released_at')->nullable();
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
