<?php

namespace U2;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $fillable = [
        'name','user',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
