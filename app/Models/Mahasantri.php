<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setoran;
use App\Models\User;


class Mahasantri extends Model
{
    use HasFactory;
    protected $table = "mahasantri";

    public function mentor() {
        return $this->belongsTo(User::class,'mentor_id','id');
    }

    public function setoran() {
        return $this->hasMany(Setoran::class,'mahasantri_id','id');
    }
}
