<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'title',
        'cover',
    ];

    public function rules(){

        return [
            'title' => 'required',
            'cover' => 'cover'
        ];
    }
}
