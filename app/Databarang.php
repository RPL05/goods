<?php

namespace App;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Model;

class Databarang extends Model
{
    use AutoNumberTrait;

    protected $table = 'databarangs';
    protected $guarded = [];

    public function getAutoNumberOptions()
    {
        return [
            'code_barang' => [
                'format' => function () {
                    return 'BRG/'. '?';
                },
                'length' => 5
            ]
        ];
    }
    public function barangmasuks()
    {
        return $this->hasMany(Barangmasuk::class);
    }
    public function barangkeluar()
    {
        return $this->hasMany(Barangkeluar::class);
    }
}
