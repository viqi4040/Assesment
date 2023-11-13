<?php

// app/Models/Tehsil.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tehsil extends Model {
    protected $table = 'tehsils';

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function unionCouncils() {
        return $this->hasMany(UnionCouncil::class);
    }
}
