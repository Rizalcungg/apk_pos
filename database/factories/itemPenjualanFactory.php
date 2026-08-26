<?php

namespace Database\Factories;

use App\Models\ItemPenjualan;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ItemPenjualan>
 */
class ItemPenjualanFactory extends Factory
{
    protected $model = ItemPenjualan::class;

    public function definition(): array
    {
        // Ambil produk acak atau buat baru jika belum ada produk sama sekali
        $produk = Produk::inRandomOrder()->first() ?? Produk::factory();
        $qty = $this->faker->numberBetween(1, 10);
        $hargaSatuan = $produk->harga_jual ?? 10000; // Fallback nilai jika berupa instance Factory

        return [
            'produk_id' => $produk->id ?? $produk,
            'kuantitas' => $qty,
            'harga_satuan' => $hargaSatuan,
            'subtotal' => $hargaSatuan * $qty,
        ];
    }
}
