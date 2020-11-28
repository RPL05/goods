<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $table = 'supliers';
    protected $guarded = [];

    public function barangmasuk()
    {
        return $this->hasMany(Barangmasuk::class);
    }
}
