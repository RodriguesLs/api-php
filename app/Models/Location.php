<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'customer_id',
        'film_id',
        'rent_date'
    ];

    public function rules(){

        return [
            'customer_id' => 'required',
            'film_id' => 'required',
            'rent_date' => 'rent_date'
        ];
    }
}
