<?php

namespace App\Models;

use App\Traits\PaginateData;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes, PaginateData;

    protected $connection = 'mongodb';

    protected $collection = 'cars';

    protected $guarded = ['_id'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', '_id')->withTrahed();
    }
}
