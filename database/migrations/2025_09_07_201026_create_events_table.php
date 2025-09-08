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
        Schema::create('events', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('event_type_id')->nullable();
            $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('set null');
            $table->date('date');
            $table->string('location')->nullable();
            $table->string('hour')->nullable();
            $table->integer('nomb_invi');
            $table->string('theme')->nullable(); 
            $table->string('competition')->nullable(); 
            $table->string('enjeux')->nullable(); 
            $table->string('picture')->nullable(); 
            $table->string('duration')->nullable(); 
            $table->string('ceremony')->nullable(); 
            $table->string('type_zik')->nullable(); 
            $table->string('module')->nullable(); 
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
