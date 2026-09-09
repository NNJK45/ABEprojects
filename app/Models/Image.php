<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'programme_id', 'evenement_id', 'actualite_id'];

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->url) {
            return null;
        }

        return Str::startsWith($this->url, ['http://', 'https://'])
            ? $this->url
            : Storage::disk('public')->url($this->url);
    }

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function actualite()
    {
        return $this->belongsTo(Actualite::class);
    }
}
