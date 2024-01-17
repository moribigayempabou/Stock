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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string("firstname");
            $table->string("lastname");
            $table->integer("telephone");
            $table->string("adresse");
            $table->string("email")->unique();
            $table->string("password");
            $table->foreignId("structures_id")->constrained("structures");
            $table->foreignId("roles_id")->constrained("roles");
            $table->boolean('actif')->default(true);
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("utilisateurs",function(Blueprint $tatble){
            $tatble->dropForeign("structures_id");
        });
        Schema::table("utilisateurs",function(Blueprint $tatble){
            $tatble->dropForeign("roles_id");
        });
        Schema::table('utilisateurs', function (Blueprint $table) {
            $table->dropColumn('actif');
        });
        Schema::dropIfExists('utilisateurs');
    }
};
