<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail',
            'password' =>bcrypt('123'),
            'role'=>'admin'
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail',
            'password' =>bcrypt('123'),
            'role'=>'customer'
        ]);

        Kategori::create([
            'name'=>'cake',
        ]);

        Kategori::create([
            'name'=>'dessert',
        ]);

        Kategori::create([
            'name'=>'drink',
        ]);

        Menu::create([
            'name'=>'Strawberry Cake',
            'harga'=>150000,
            'foto'=>'img/cake1.jpg',
            'kategori_id'=>1
        ]);

        Menu::create([
            'name'=>'Strawberry Mochi',
            'harga'=>123000,
            'foto'=>'img/dessert2.jpg',
            'kategori_id'=>2
        ]);

        Menu::create([
            'name'=>'Cookies Strawberry',
            'harga'=>120000,
            'foto'=>'img/dessert4.jpg',
            'kategori_id'=>2
        ]);
        Menu::create([
            'name'=>'Choco Fla',
            'harga'=>90000,
            'foto'=>'img/dessert6.jpg',
            'kategori_id'=>2
        ]);
        Menu::create([
            'name'=>'Matcha Vanilla Smothie',
            'harga'=>120000,
            'foto'=>'img/drink3.jpg',
            'kategori_id'=>3
        ]);

    }
}
