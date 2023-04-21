<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemorqueDefaut extends Model
{
    use HasFactory;

    protected $fillable = ['remorque_id', 'user_id', 'valider', 'interieur', 'exterieur', 'autre'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');

    }


    public function remorque()
    {
        return $this->belongsTo('App\Models\Remorque');
    }
}
