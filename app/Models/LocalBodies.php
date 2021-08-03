<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\Taluk;

class LocalBodies extends Eloquent
{
    use HasFactory;

    use SoftDeletes;
    protected $collection = "local_bodies";

    protected $fillable = [
        'name',
        'country_id',
        'state_id',
        'district_id',
        'taluk_id',
        'type'
    ];

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

    public function taluk()
    {
        return $this->belongsTo(Taluk::class)->withDefault([
            'name' => '',
        ]);
    }
}
