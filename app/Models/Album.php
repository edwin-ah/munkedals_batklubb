<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'description',
        'album_year_id'
    ];

    public function albumImage() {
        return $this->hasMany(AlbumImage::class);
    }
}
