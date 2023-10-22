<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClusHasil extends Model
{
    use HasFactory;

    public function data()
    {
        return $this->hasMany(Data::class);
    }

    public function getFileMarkerAttribute()
    {
        $file = $this->marker;
        return asset('storage/marker/' . $file);
    }
}
