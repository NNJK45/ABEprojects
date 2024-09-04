<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description'];

    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
