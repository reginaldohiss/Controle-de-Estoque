<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    public $timestamps = true;

    protected $fillable = [
        'name', 'unity', 'code', 'price'
    ];

    public function search(Array $data)
    {
        return $this->where(function ($query) use($data){
            if(isset($data['code'])){
                $query->where('code', 'like', "%{$data['code']}%");
            }
        })
            ->paginate(7);
    }

    public function provide()
    {
        return $this->hasMany(Provider::class, 'stock', 'id');
    }
}
