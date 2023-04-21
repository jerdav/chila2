<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remorque extends Model
{
    use HasFactory;

    protected $fillable = ['immatriculation', 'n°_de_parc'];

    public function tracteurdefaut()
    {
        return $this->belongsTo(TracteurDefaut::class);
    }

    public function tracteur()
    {
        return $this->belongsTo(Tracteur::class);
    }
}
