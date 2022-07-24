<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create(
            [
                'name' => 'Free Plan',
                'price' => 0,
                'duration' => 'Unlimited',
                'max_users' => 5,
                'max_customers' => 5,
                'max_categories' => 5,
                'max_products' => 10,
                'image'=>'free_plan.png',
            ]
        );
    }
}
