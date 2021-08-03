<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Promotor extends Eloquent
{
    use HasFactory;

    use SoftDeletes;
    protected $collection = "promotors";
}
