<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'programme_id', 'evenement_id'];

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}
