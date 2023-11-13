<?php

// app/Models/UnionCouncil.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnionCouncil extends Model {
    protected $table = 'union_councils';

    public function tehsil() {
        return $this->belongsTo(Tehsil::class);
    }

    public function households() {
        return $this->hasMany(Household::class);
    }
	public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
