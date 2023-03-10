<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    // Relazione con User
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function messages()
    {
        return $this->belongsTo('App\Models\Message');
    }

    public function images()
    {
        return $this->belongsTo('App\Models\Image');
    }

    public function views()
    {
        return $this->belongsTo('App\Models\View');
    }

    public function services()
    {
        return $this->belongsToMany('App\Models\Service');
    }

    protected $fillable = [
        'name',
        'description',
        'cover_image',
        'rooms',
        'beds',
        'bathrooms',
        'mq',
        'accomodation',
        'lat',
        'long',
        'address',
        'available',
        'price',
        'user_id'
    ];
}
