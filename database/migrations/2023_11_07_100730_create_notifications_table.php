<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('structures_id');// ID de la structure destinataire
            $table->text('message');// Message de la notification
            $table->string('link');// Lien vers la ressource associée (par exemple, lien vers l'affectation)
            $table->boolean('is_read')->default(false);// Indique si la notification a été lue
            $table->timestamps();

            $table->foreign('structures_id')->references('id')->on('structures');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}