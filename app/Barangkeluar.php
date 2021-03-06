<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    protected $table = 'barangkeluars';
    protected $guarded = [];

    public function databarang()
    {
        return $this->belongsTo(Databarang::class);
    }
}
