<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'year'
    ];

    public function album() {
        return $this->hasMany(Album::class);
    }
}
