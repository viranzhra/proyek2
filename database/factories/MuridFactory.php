<?php

namespace Database\Factories;

use App\Models\Murid;
use Illuminate\Database\Eloquent\Factories\Factory;

class MuridFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Murid::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nisn_murid' => $this->faker->unique()->numerify('##########'), // Generate a unique 10-digit number
            'nama_murid' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'tgl_lahir' => $this->faker->date,
            'id_kelas' => $this->faker->numberBetween(1, 10), // Adjust the range based on your 'kelas' data
            'id_ta' => $this->faker->numberBetween(1, 5), // Adjust the range based on your 'tahun_angkatan' data
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
