<?php

namespace Database\Factories;

use App\Models\itemPenjualan;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produk;
/**
 * @extends Factory<itemPenjualan>
 */
class itemPenjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = itemPenjualan::class;

    public function definition(): array
    {
            $produk = Produk::inRandomOrder()->first();
            $qty = $this->faker->numberBetween(1, 10);

return [
    'produk_id' => $produk->id,
    'kuantitas' => $qty,
    'harga_satuan' => $produk->harga_jual,
    'subtotal' => $produk->harga_jual * $qty,
];
        
    }
}
