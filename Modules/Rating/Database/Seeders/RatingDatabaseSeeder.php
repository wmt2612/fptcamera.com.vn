<?php

namespace Modules\Rating\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Rating\Entities\Rating;

class RatingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        factory(Rating::class, 100)->create();
        // $this->call("OthersTableSeeder");
    }
}
