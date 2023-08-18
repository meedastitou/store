<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $plan = Plan::create([
            'name'    => 'plan1',
            'description'    => 'description plan 1',
            'price'     => 222,
            'status'  => true,
        
        ]);
        Plan::create([
            'name'    => 'plan2',
            'description'    => 'description plan 2',
            'price'     => 200,
            'status'  => true,
        
        ]);
        Plan::create([
            'name'    => 'plan3',
            'description'    => 'description plan 3',
            'price'     => 150,
            'status'  => true,
        
        ]);
        Plan::create([
            'name'    => 'plan4',
            'description'    => 'description plan 4',
            'price'     => 100,
            'status'  => false,
        
        ]);
    }
}
