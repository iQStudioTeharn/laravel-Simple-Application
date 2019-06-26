<?php

use Illuminate\Database\Seeder;

class RoleTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert(['name'=>'adminstrator']);
        DB::table('roles')->insert(['name'=>'author']);
        DB::table('roles')->insert(['name'=>'subscriber']);
        DB::table('roles')->insert(['name'=>'publisher']);
    }
}
