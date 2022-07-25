<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'duration',
        'max_users',
        'max_customers',
        'max_categories',
        'max_products',
        'description',
        'image',
    ];

    public static $arrDuration = [
        'unlimited' => 'Unlimited',
        'month' => 'Per Month',
        'year' => 'Per Year',
    ];

    public static function total_plan()
    {
        return Plan::count();
    }

    public static function most_purchese_plan()
    {
        $free_plan = Plan::where('price', '<=', 0)->first()->id;

        return User:: select(DB::raw('count(*) as total'))->where('type', '=', 'company')->where('plan', '!=', $free_plan)->groupBy('plan')->first();
    }
}
