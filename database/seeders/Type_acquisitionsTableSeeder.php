<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Type_acquisitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('type_acquisitions')->insert([
        ["libelle"=>"DON"],
        ["libelle"=>"ACHAT"],
        ["libelle"=>"LEGUE"],
        ["libelle"=>"EMPRUNT"],
       ]);
    }
}
