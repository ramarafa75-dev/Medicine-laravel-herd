<?php

namespace Database\Factories;

use App\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'  => fake()->randomElement([
                'Paracetamol', 'Amoxicillin', 'Ibuprofen', 'Antasida',
                'Cetirizine', 'Omeprazole', 'Metformin', 'Amlodipine',
                'Simvastatin', 'Dexamethasone', 'Ranitidine', 'Ciprofloxacin',
                'Loratadine', 'Salbutamol', 'Vitamin C', 'Vitamin D',
                'Zinc Sulfate', 'Rifampicin', 'Isoniazid', 'Cefadroxil',
            ]) . ' ' . fake()->numerify('## mg'),

            'jenis' => fake()->randomElement([
                'Tablet', 'Sirup', 'Kapsul', 'Salep', 'Injeksi'
            ]),

            'price' => fake()->randomElement([
                5000, 7500, 10000, 12500, 15000,
                20000, 25000, 30000, 50000, 75000, 100000
            ]),

            'stock' => fake()->numberBetween(10, 500),
        ];
    }
}
