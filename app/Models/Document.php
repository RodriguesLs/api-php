<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Document extends Model
{
    protected $fillable = [
        'customer_id',
        'cpf_cnpj'
    ];

    public function rules(){
        return [
            'customer_id' => 'required',
            'cpf_cnpj' => 'required|unique:documents'
        ];
    }
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
