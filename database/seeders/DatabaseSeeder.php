<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ===== USER SEEDER =====
        User::create([
            'name' => 'Normal User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Super Owner',
            'email' => 'owner@example.com',
            'password' => bcrypt('password'),
            'role' => 'owner',
        ]);

        User::create([
            'name' => 'Mahasiswa UTS',
            'email' => 'uts@example.com',
            'password' => bcrypt('password'),
            'role' => 'uts',
        ]);

        $kategori1 = Category::create([
            'name' => 'Elektronik',
            'description' => 'Produk-produk elektronik rumah tangga dan kantor.',
        ]);

        $kategori2 = Category::create([
            'name' => 'Pakaian',
            'description' => 'Produk pakaian dan aksesoris.',
        ]);

        $kategori3 = Category::create([
            'name' => 'Makanan & Minuman',
            'description' => 'Produk konsumsi dan bahan makanan.',
        ]);

        Product::insert([
            [
                'product_name' => 'Laptop Asus ROG Zephyrus',
                'unit' => 'unit',
                'type' => 'Elektronik',
                'information' => 'Laptop gaming high-end dengan RTX 4070',
                'qty' => 12,
                'producer' => 'ASUS Indonesia',
                'category_id' => $kategori1->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Kaos Polos Katun Premium',
                'unit' => 'pcs',
                'type' => 'Pakaian',
                'information' => 'Kaos nyaman dan lembut untuk sehari-hari',
                'qty' => 50,
                'producer' => 'CottonID Garment',
                'category_id' => $kategori2->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Kopi Arabika Gayo 250gr',
                'unit' => 'pack',
                'type' => 'Makanan & Minuman',
                'information' => 'Kopi khas Gayo dengan aroma kuat dan rasa seimbang',
                'qty' => 25,
                'producer' => 'Gayo Coffee Co.',
                'category_id' => $kategori3->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
