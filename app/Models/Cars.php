<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'customer_id',
        'discreption',
        'data',
        'body',
        'technical_check',
        'wheels',
        'options',
        'diag',
        'vip_services',
        'created_at',
        'updated_at'
    ];

    public function store($cars,$request,$customer){
        $cars::create([
            'name' => $request->car,
            "customer_id"=> $customer->latest()->first()->id,
        ]);
    }
}
