<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [ 'programme_id', 'titre', 'description', 'lieu', 'date', 'année_event', 'image'];

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
