<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Pusing', 'Demam', 'Antibiotik'];

        foreach ($categories as $cat) {
            \App\Models\Medicine::create([
                'name'      => "Panadol $cat",
                'jenis'     => "Jenis $cat",
                'price'     => 5000,
                'stock'     => 10,
            ]);
        }
    }
}
