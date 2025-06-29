<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'date_naissance', 'medecin_id'];

    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }
}
