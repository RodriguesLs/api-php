<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Phone extends Model
{
    public $fillable = [
        'customer_id',
        'number'
    ];
    
    public function rules(){
        return [
            'customer_id' => 'required',
            'number' => 'required'
        ];
    }
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

}
