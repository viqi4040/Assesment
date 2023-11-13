<?php

// app/Models/Division.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model {
    protected $table = 'divisions';

    public function province() {
        return $this->belongsTo(Province::class);
    }

    public function districts() {
        return $this->hasMany(District::class);
    }
}
