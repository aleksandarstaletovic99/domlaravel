<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    public function tipfilma(){
        return $this->belongsTo(TipFilma::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
