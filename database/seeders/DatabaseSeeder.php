<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Galleri;
use App\Models\Achievement;
use App\Models\Project;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password123'), // gunakan bcrypt untuk password
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Galleri::create([
            'title' => 'Pemandangan Gunung',
            'image' => 'mountain.jpg',
            'description' => 'Foto diambil saat sunrise di Gunung Bromo.',
            'taken_at' => '2024-06-15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Galleri::create([
            'title' => 'Kegiatan Sekolah',
            'image' => 'school_event.jpg',
            'description' => 'Dokumentasi kegiatan lomba 17 Agustus.',
            'taken_at' => '2023-08-17',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Galleri::create([
            'title' => 'Juara Lomba Coding',
            'image' => 'coding_competition.jpg',
            'description' => null,
            'taken_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Achievement::create([
            'title' => 'Juara 1 Lomba UI/UX',
            'name' => 'Iman Maulana',
            'category' => 'Lomba UI/UX',
            'level' => 'Nasional',
            'year' => 2024,
            'certificate_image' => 'certificate_web_dev.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Achievement::create([
            'title' => 'Juara 1 Lomba Web Development',
            'name' => 'Budi Santoso',
            'category' => 'Web Development',
            'level' => 'Nasional',
            'year' => 2024,
            'certificate_image' => 'cert_budi.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Achievement::create([
            'title' => 'Juara 2 Lomba Cloud Computing',
            'name' => 'Januardy Neki Putra',
            'category' => 'Cloud Computing',
            'level' => 'Provinsi',
            'year' => 2024,
            'certificate_image' => 'cert_januardy.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Project::create([
            'title' => 'Aplikasi Manajemen Inventaris',
            'type'=>'website',
            'description' => 'Aplikasi web untuk mengelola inventaris barang di kantor dengan fitur laporan dan notifikasi stok.',
            'tech_stack' => json_encode(['Laravel', 'Vue.js', 'MySQL']),
            'link_preview' => 'https://inventaris-demo.netlify.app',
            'github_link' => 'https://github.com/username/inventaris-app',
            'thumbnail' => 'inventaris.png',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Project::create([
            'title' => 'Website Portofolio Pribadi',
            'type'=>'website',
            'description' => 'Website portofolio untuk menampilkan hasil karya dan pengalaman kerja.',
            'tech_stack' => json_encode(['Laravel', 'Bootstrap']),
            'link_preview' => 'https://portofolio.vercel.app',
            'github_link' => 'https://github.com/username/portofolio',
            'thumbnail' => 'portofolio.png',
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Project::create([
            'title' => 'Sistem Informasi Perpustakaan',
            'type'=>'mobile_application',
            'description' => 'Sistem untuk mengelola data buku, peminjaman, dan pengembalian di perpustakaan sekolah.',
            'tech_stack' => json_encode(['Laravel', 'React', 'PostgreSQL']),
            'link_preview' => null,
            'github_link' => 'https://github.com/username/perpustakaan',
            'thumbnail' => null,
            'status' => 'draft',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
