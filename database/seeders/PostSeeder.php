<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'Belajar Laravel Dasar',
            'status' => 'published',
            'content' => 'Laravel merupakan framework PHP untuk membangun aplikasi web.',
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Mengenal Database MySQL',
            'status' => 'published',
            'content' => 'MySQL merupakan sistem manajemen basis data relasional.',
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Tutorial PHP untuk Pemula',
            'status' => 'draft',
            'content' => 'PHP adalah bahasa pemrograman untuk membangun aplikasi web dinamis.',
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Pengenalan REST API',
            'status' => 'published',
            'content' => 'REST API memungkinkan aplikasi saling berkomunikasi melalui HTTP.',
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Belajar Lumen Framework',
            'status' => 'draft',
            'content' => 'Lumen merupakan micro-framework PHP berbasis Laravel.',
            'user_id' => 1
        ]);
    }
}
