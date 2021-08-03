<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\State;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Eloquent
{
    
    use SoftDeletes;
    protected $collection = "countries";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'sortcode',
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }

}
