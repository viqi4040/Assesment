<?php
// app/Models/Province.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model {
    protected $table = 'provinces';

    public function divisions() {
        return $this->hasMany(Division::class);
    }
}
