<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = ['programme_id', 'titre', 'description', 'lieu', 'date', 'annee_event', 'image'];

    protected $casts = [
        'date' => 'date',
        'annee_event' => 'integer',
    ];

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        return Str::startsWith($this->image, ['http://', 'https://'])
            ? $this->image
            : Storage::disk('public')->url($this->image);
    }

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
