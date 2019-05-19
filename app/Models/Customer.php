<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Document;
use App\Models\Phone;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'image',
    ];

    public function rules(){

        return [
            'name' => 'required',
            'image' => 'image',
        ];
    }
    public function updateRules(){

        return [
            'name',
            'image' => 'image',
        ];
    }

    public function document(){
        return $this->hasOne(Document::class, 'customer_id', 'id');
    }
    public function phone(){
        return $this->hasMany(Phone::class, 'customer_id', 'id');
    }
}