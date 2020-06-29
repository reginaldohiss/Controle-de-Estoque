<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    public $timestamps = true;

    protected $fillable = [
        'client', 'CPF', 'Identity'
    ];

    public function search(Array $data)
    {
        return $this->where(function ($query) use($data){
            if(isset($data['client'])){
                $query->where('client', 'like', "%{$data['client']}%");
            }
        })
            ->paginate(7);
    }
}
