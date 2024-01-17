<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emetteur_id');
            $table->unsignedBigInteger('destinataire_id')->default(1); // Remplacez la valeur par défaut
            $table->text('message');
            $table->enum('demande_statut_id', ['en_cours', 'traitee', 'favorable', 'non_favorable'])->default('en_cours');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demandes');
    }
}


