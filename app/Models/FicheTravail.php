<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheTravail extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'remorque_id', 'tracteur_id', 'oil', 'adb', 'netpl', 'netsemi', 'repar', 'valider'];

    protected $casts = [
        'oil' => Json::class,
        'adb' => Json::class,
        'netpl' => Json::class,
        'netsemi' => Json::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tracteur()
    {
        return $this->belongsTo(Tracteur::class);
    }

    public function remorque()
    {
        return $this->belongsTo(Remorque::class);
    }
}
