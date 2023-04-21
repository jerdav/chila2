<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracteurDefaut extends Model
{
    use HasFactory;

    protected $fillable = ['tracteur_id', 'user_id', 'valider', 'interieur', 'exterieur', 'autre'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tracteur()
    {
        return $this->belongsTo('App\Models\Tracteur');
    }
}
