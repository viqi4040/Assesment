<?php
// app/Models/District.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model {
    protected $table = 'districts';

    public function division() {
        return $this->belongsTo(Division::class);
    }

    public function tehsils() {
        return $this->hasMany(Tehsil::class);
    }
}
