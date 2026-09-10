<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'image'];

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        return Str::startsWith($this->image, ['http://', 'https://'])
            ? $this->image
            : Storage::disk('public')->url($this->image);
    }

    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
