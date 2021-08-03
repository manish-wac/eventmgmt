<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use App\Models\District;
use App\Models\Country;

class State extends Eloquent
{
    use SoftDeletes;
    protected $collection = "states";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'state_code',
        'country_id'
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }
    public function country() 
    {
        return $this->belongsTo(Country::class)->withDefault([
            'name' => '', 'sortcode' => ''
        ]);
    }
}
