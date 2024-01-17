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
        Schema::create('acquisitions', function (Blueprint $table) {
            $table->id(); // Colonne d'identifiant unique (clé primaire)
            $table->foreignId('type_acquisitions_id')->constrained('type_acquisitions'); // Colonne de clé étrangère liée à la table "type_d_acquisition"
            $table->string("source"); // Colonne pour stocker la source de l'acquisition
            $table->timestamps(); // Colonnes pour les horodatages "created_at" et "updated_at"
        });
        Schema::enableForeignKeyConstraints(); // Activation des contraintes de clé étrangère
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("acquisitions", function(Blueprint $table) {
            $table->dropForeign("type_acquisitions_id"); // Suppression de la contrainte de clé étrangère sur la colonne "type_d_acquisition_id" de la table "materiels"
        });
        Schema::dropIfExists('acquisitions'); // Suppression de la table "acquisitions" si elle existe
    }
};
