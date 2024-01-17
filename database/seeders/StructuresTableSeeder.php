<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StructuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('structures')->insert([
            ["nom" => "UFR/LAC"],
            ["nom" => "UFR/SDS"],
            ["nom" => "UFR/SH"],
            ["nom" => "UFR/SVT"],
            ["nom" => "UFR/SEA"],
            ["nom" => "IBAM"],
            ["nom" => "ISSDH"],
            ["nom" => "IFOAD"],
            ["nom" => "ISSP"],
            ["nom" => "IPERMIC"],
            ["nom" => "IGEDD"],
            ["nom" => "CU/KAYA"],
            ["nom" => "CU/ZINIARE"],
            ["nom" => "PRESIDENCE"],
        ]);
    }
}
