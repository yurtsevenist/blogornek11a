<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
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
        $authors = User::where('role', User::ROLE_AUTHOR)->get(['id', 'name']);

        for ($number = 1; $number <= 20; $number++) {
            $attributes = Post::factory()->make()->getAttributes();
            $attributes['slug'] = sprintf('faker-yazi-%02d', $number);

            $author = $authors->isEmpty() ? null : $authors->random();
            $attributes['user_id'] = $author?->id;
            $attributes['author_name'] = $author?->name ?? $attributes['author_name'];

            Post::updateOrCreate(
                ['slug' => $attributes['slug']],
                $attributes
            );
        }
    }
}
