<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'contenu', 'date_publication', 'image'];

    protected $casts = [
        'date_publication' => 'date',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
