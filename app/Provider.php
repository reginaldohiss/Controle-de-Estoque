<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    public $timestamps = true;

    protected $fillable = [
        'provider', 'company', 'CNPJ', 'stock'
    ];

    public function search(Array $data)
    {
        return $this->where(function ($query) use($data){
            if(isset($data['company'])){
                $query->where('company', 'like', "%{$data['company']}%");
            }
        })
            ->paginate(7);
    }
    public function produc()
    {
        return $this->belongsTo(Product::class, 'stock', 'id');
    }
}
