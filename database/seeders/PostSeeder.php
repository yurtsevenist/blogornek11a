<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Faker ile 20 farklı Türkçe blog yazısı oluşturur.
     * Sabit seed slug'ları tekrar çalıştırıldığında yeni kopya oluşmasını önler.
     *
     * @return void
     */
    public function run()
    {
        for ($number = 1; $number <= 20; $number++) {
            $attributes = Post::factory()->make()->getAttributes();
            $attributes['slug'] = sprintf('faker-yazi-%02d', $number);

            Post::updateOrCreate(
                ['slug' => $attributes['slug']],
                $attributes
            );
        }
    }
}
