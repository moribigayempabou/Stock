<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetourMaterielsTable extends Migration
{
    public function up()
    {
        Schema::create('retour_materiels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('affectations_id');
            $table->integer('quantite_retourne');
            $table->unsignedBigInteger('users_id');
            $table->text('commentaire')->nullable();
            $table->timestamps();

            // Clés étrangères
            $table->foreign('affectations_id')->references('id')->on('affectations');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('retour_materiels');
    }
}

