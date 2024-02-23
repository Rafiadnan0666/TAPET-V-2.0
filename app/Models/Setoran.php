<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasantri;

class Setoran extends Model
{
    use HasFactory;
    protected $table = "setoran";

    public function mahasantri() {
        return $this->belongsTo(Mahasantri::class,'mahasantri_id','id');
    }
}
