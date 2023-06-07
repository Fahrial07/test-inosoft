<?php

namespace App\Models;

use App\Traits\PaginateData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes, PaginateData;

    protected $connection = 'mongodb';

    protected $collection = 'vehicles';

    protected $guarded = ['_id'];


    public function car()
    {
        return $this->hasMany(Car::class, 'vehicle_id', '_id');
    }
    public function motorcycle()
    {
        return $this->hasManyThrough(Motorcycle::class, 'vehicle_id', '_id');
    }

}
