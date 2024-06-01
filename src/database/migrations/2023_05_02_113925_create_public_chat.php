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
        Schema::create('public_chat', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('chat')->nullable();
            $table->text('chat_script')->nullable();
            $table->string('google_analytics_title')->nullable();
            $table->string('google_analytics_chat')->nullable();
            $table->text('google_analytics_chat_script')->nullable();

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
        Schema::dropIfExists('public_chat');
    }
};
