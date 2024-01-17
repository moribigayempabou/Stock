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
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materiels_id')->constrained("materiels");
            $table->integer('quantite_affecte');
            $table->foreignId('structures_id')->constrained("structures");

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table("affectations",function(Blueprint $tatble){
            $tatble->dropForeign("structures_id");
        });
        Schema::table("affectations",function(Blueprint $tatble){
            $tatble->dropForeign("materiels_id");
        });
        Schema::dropIfExists('affectations');
    }
};
