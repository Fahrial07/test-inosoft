<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'cars';

    protected $guarded = ['_id'];
}
