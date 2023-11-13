<?php

// app/Models/Household.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Household extends Model {
    protected $table = 'households';

    protected $fillable = ['name', 'address', 'street', 'house_no', 'union_council_id'];

    public function unionCouncil() {
        return $this->belongsTo(UnionCouncil::class);
    }

    public function householdMembers() {
        return $this->hasMany(HouseholdMember::class);
    }
}
