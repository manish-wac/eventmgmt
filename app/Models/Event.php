<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\City;


class Event extends Eloquent
{
    use HasFactory,SoftDeletes;
    protected $collection = "events";

    public function country()
    {
        return $this->belongsTo(Country::class)->withDefault([
            'name' => '',
        ]);
    }

    public function state()
    {
        return $this->belongsTo(State::class)->withDefault([
            'name' => '',
        ]);
    }

    public function district()
    {
        return $this->belongsTo(District::class)->withDefault([
            'name' => '',
        ]);
    }
    public function city()
    {
        return $this->belongsTo(City::class)->withDefault([
            'name' => '',
        ]);
    }

}
