<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'evenement_id', 'actualite_id'];

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }

    public function actualite()
    {
        return $this->belongsTo(Actualite::class);
    }
}
