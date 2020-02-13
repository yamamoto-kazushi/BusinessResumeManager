<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Codec\TimestampLastCombCodec;

class ResumeListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ResumeList::Class, 30)->create();
    }
}
