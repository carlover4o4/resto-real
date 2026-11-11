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
            'name'=>'makanan',
        ]);

        Kategori::create([
            'name'=>'minuman'
        ]);

        Menu::create([
            'name'=>'Pempek',
            'harga'=>20000,
            'foto'=>'img/pempek.png',
            'kategori_id'=>1
        ]);

        Menu::create([
            'name'=>'Sate',
            'harga'=>30000,
            'foto'=>'img/sate.png',
            'kategori_id'=>1
        ]);

        Menu::create([
            'name'=>'Seblak',
            'harga'=>25000,
            'foto'=>'img/seblak.png',
            'kategori_id'=>1
        ]);
        Menu::create([
            'name'=>'Pecel Lele',
            'harga'=>40000,
            'foto'=>'img/pecellele.png',
            'kategori_id'=>1
        ]);
        Menu::create([
            'name'=>'Es Campur',
            'harga'=>20000,
            'foto'=>'img/escampur.png',
            'kategori_id'=>2
        ]);
        Menu::create([
            'name'=>'Es Cendol',
            'harga'=>15000,
            'foto'=>'img/escendol.png',
            'kategori_id'=>2
        ]);

    }
}
