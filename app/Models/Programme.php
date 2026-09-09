<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'image'];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? Storage::disk('public')->url($this->image) : null;
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
