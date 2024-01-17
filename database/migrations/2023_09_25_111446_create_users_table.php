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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('structures_id')->constrained('structures');
            $table->foreignId('roles_id')->constrained('roles');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("users", function(Blueprint $table) {
            $table->dropForeign("structures_id"); // Suppression de la contrainte de clé étrangère sur la colonne "type_d_acquisition_id" de la table "materiels"
        });
        Schema::table("users", function(Blueprint $table) {
            $table->dropForeign("roles_id"); // Suppression de la contrainte de clé étrangère sur la colonne "type_d_acquisition_id" de la table "materiels"
        });
        Schema::dropIfExists('users');
    }
};

