<?php

namespace App\Models;

use App\Traits\PaginateData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;


class Motorcycle extends Model
{
    use HasFactory, SoftDeletes, PaginateData;

    protected $connection = 'mongodb';
    protected $table = 'motorcycles';

    protected $guarded = ['_id'];

    protected $with = ['vehicle'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', '_id');
    }
}
