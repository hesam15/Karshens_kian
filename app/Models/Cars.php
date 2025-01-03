<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cars extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'customer_id',
        'report_id',
        'image',
        'color',
        'license_plate',
    ];

    public function store($cars,$request,$customer){
        $cars::create([
            'name' => $request->car,
            "customer_id"=> $customer->latest()->first()->id,
        ]);
    }

    public function attrs(){
        $body = json_decode(json: $this->body);
        $technical_check = json_decode($this->technical_check);
        $options = json_decode($this->options);
        $diag = json_decode($this->diag);
        $vip_services = json_decode($this->vip_services);

        return [
            'body' => $body,
            'technical_check' => $technical_check,
            'options' => $options,
            'diag' => $diag,
            'vip_services' => $vip_services,
        ];
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }
}
