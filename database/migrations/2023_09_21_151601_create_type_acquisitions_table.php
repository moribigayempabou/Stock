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
        Schema::create('type_acquisitions', function (Blueprint $table) {
            $table->id(); // Colonne d'identifiant unique (clé primaire)
            $table->string('libelle'); // Colonne pour stocker le libellé du type d'acquisition
            $table->timestamps(); // Colonnes pour les horodatages "created_at" et "updated_at"
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_acquisitions');
    }
};
