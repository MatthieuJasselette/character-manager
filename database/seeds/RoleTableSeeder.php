<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_mims = new Role();
        $role_mims->name = 'mims';
        $role_mims->description = 'A mims rank User';
        $role_mims->save();
        
        $role_admims = new Role();
        $role_admims->name = 'admims';
        $role_admims->description = 'A admims rank User';
        $role_admims->save();
    }
}
