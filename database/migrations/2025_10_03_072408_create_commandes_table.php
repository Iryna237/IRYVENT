<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_commandes_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->foreignId('ticket_id')->constrained()->onDelete('cascade');
            $table->string('ticket_type');
            $table->decimal('amount', 10, 2);
            $table->string('currency')->default('XAF');
            $table->string('reference')->unique();
            $table->string('statut'); // pending, confirmed, cancelled
            $table->integer('quantity')->default(1);
            $table->text('customer_email');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commandes');
    }
};