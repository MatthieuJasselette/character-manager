<?php

use Illuminate\Database\Seeder;
use App\Character;

class CharacterTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Character::class, 12)->create();
    }
}
