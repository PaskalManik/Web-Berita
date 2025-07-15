<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category; // <-- 1. Import Category
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // <-- 2. Import Str

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $categories = collect([
            'Tanpa Kemiskinan', 'Tanpa Kelaparan', 'Kehidupan Sehat dan Sejahtera', 'Pendidikan Berkualitas', 'Kesetaraan Gender', 'Air Bersih dan Sanitasi Layak', 'Energi Bersih dan Terjangkau', 'Pekerjaan Layak dan Pertumbuhan Ekonomi', 'Industri, Inovasi dan Infrastruktur', 'Berkurangnya Kesenjangan', 'Kota dan Permukiman yang Berkelanjutan', 'Konsumsi dan Produksi yang Bertanggung Jawab', 'Penanganan Perubahan Iklim', 'Ekosistem Lautan', 'Ekosistem Darat', 'Perdamaian, Keadilan dan Kelembagaan yang Tangguh', 'Kemitraan untuk Mencapai Tujuan'
        ])->map(function ($name) {
            return Category::create(['name' => $name, 'slug' => Str::slug($name)]);
        });

        Post::factory(20)->create()->each(function ($post) use ($categories) {
            $post->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}