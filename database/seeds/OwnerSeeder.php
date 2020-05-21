<?php

use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner1 = new \App\Owner();
        $owner1->name = "Marytė";
        $owner1->surname = "Gražuolytė";
        $owner1->save();
        $owner2 = new \App\Owner();
        $owner2->name = "Jonukas";
        $owner2->surname = "Pagaliukas";
        $owner2->save();
    }
}
