<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Faker ile 100 örnek kullanıcı oluşturur; bunlardan biri yöneticidir.
     * Sabit e-posta adresleri seeder'ın tekrar çalıştırılınca kopya üretmesini önler.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(config('app.faker_locale', 'tr_TR'));
        $otherRoles = [
            User::ROLE_USER,
            User::ROLE_USER,
            User::ROLE_USER,
            User::ROLE_USER,
            User::ROLE_USER,
            User::ROLE_USER,
            User::ROLE_USER,
            User::ROLE_AUTHOR,
            User::ROLE_AUTHOR,
            User::ROLE_EDITOR,
        ];

        for ($number = 1; $number <= 100; $number++) {
            $email = $number === 1
                ? 'admin@example.test'
                : sprintf('ornek.kullanici%03d@example.test', $number);

            $role = $number === 1
                ? User::ROLE_ADMIN
                : $faker->randomElement($otherRoles);

            $attributes = User::factory()->make(['email' => $email])->getAttributes();
            $user = User::firstOrNew(['email' => $email]);
            $user->forceFill($attributes);
            $user->forceFill(['role' => $role]);
            $user->save();
        }
    }
}
