<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'name', 'surname', 'street_name',
        'street_number', 'zip_code', 'city',
        'phone_number',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
