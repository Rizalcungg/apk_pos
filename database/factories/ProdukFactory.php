<?php

namespace Database\Factories;

use App\Models\Produk;
use App\Models\User;
use App\Models\Jenis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Produk::class;

    public function definition(): array
    {
        $hargaBeli = $this->faker->numberBetween(10_000, 500_000);

        return [
            // Menggunakan fallback jika user dengan role_id 1 tidak ditemukan
            'user_id' => User::where('role_id', 1)->inRandomOrder()->value('id') ?? User::factory(),
            'jenis_id' => Jenis::inRandomOrder()->value('id') ?? Jenis::factory(),
            'foto' => 'produk/' . $this->faker->uuid . '.jpg', // Ditambahkan titik (.jpg)
            'nama' => ucfirst($this->faker->words(3, true)),
            'harga_beli' => $hargaBeli,
            'harga_jual' => $hargaBeli + $this->faker->numberBetween(5_000, 100_000), // Perbaikan nol
            'stok' => $this->faker->numberBetween(1, 500),
        ];
    }
}
