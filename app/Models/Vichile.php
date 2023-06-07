<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vichile extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'vichiles';

    protected $guarded = ['_id'];
}
