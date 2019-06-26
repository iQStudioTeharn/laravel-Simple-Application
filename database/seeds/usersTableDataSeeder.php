<?php

use Illuminate\Database\Seeder;

class usersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        factory(App\User::class, 5)->create()->each(function($u) {
            $u->posts()->save(factory(App\Posts::class)->make());
        });
        
    }
}
