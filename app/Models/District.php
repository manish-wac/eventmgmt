<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

use App\Models\Taluk;
use App\Models\State;
use App\Models\Country;
class District extends Eloquent
{
    use SoftDeletes;
    
    protected $collection = "districts";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'state_id',
        'country_id'
    ];

    public function taluks()
    {
        return $this->hasMany(Taluk::class);
    }

    public function country() 
    {
        return $this->belongsTo(Country::class)->withDefault([
            'name' => '', 'sortcode' => ''
        ]);
    }

    public function state() 
    {
        return $this->belongsTo(State::class)->withDefault([
            'name' => '', 'state_code' => ''
        ]);
    }

}
