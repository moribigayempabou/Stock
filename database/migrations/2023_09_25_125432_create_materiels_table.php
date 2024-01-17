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
        Schema::create('materiels', function (Blueprint $table) {
            $table->id(); // Colonne d'identifiant unique (clé primaire)
            $table->string('reference')->unique(); // Colonne pour stocker la référence du matériel (avec contrainte d'unicité)
            $table->string("nom"); // Colonne pour stocker le nom du matériel
            $table->string("type_materiel"); // Colonne pour stocker le type de matériel
            $table->string("description")->nullable();// Colonne pour stocker la description du matériel
            $table->integer("quantite"); // Colonne pour stocker la quantité du matériel
            $table->integer("quantite_reste")->nullable();
            $table->string("etat"); // Colonne pour stocker l'état du matériel
            $table->foreignId('acquisitions_id')->constrained('acquisitions'); // Colonne de clé étrangère liée à la table "type_d_acquisition"
            $table->timestamps(); // Colonnes pour les horodatages "created_at" et "updated_at"
        });
        Schema::enableForeignKeyConstraints(); // Activation des contraintes de clé étrangère
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("materiels", function(Blueprint $table) {
            $table->dropForeign("acquisitions_id"); // Suppression de la contrainte de clé étrangère sur la colonne "type_d_acquisition_id" de la table "materiels"
        });
        Schema::dropIfExists('materiels'); // Suppression de la table "materiels" si elle existe
    }
};
