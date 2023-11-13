<?php

// app/Models/HouseholdMember.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseholdMember extends Model {
    protected $table = 'household_members';

    protected $fillable = ['name', 'age', 'relationship', 'household_id'];

    public function household() {
        return $this->belongsTo(Household::class);
    }
}
