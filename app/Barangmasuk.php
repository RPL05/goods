<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
    protected $table = 'barangmasuks';
    protected $guarded = [];

    public function databarang()
    {
        return $this->belongsTo(Databarang::class);
    }
    public function suplier()
    {
        return $this->belongsTo(Suplier::class);
    }
}
