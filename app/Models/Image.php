<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'created_at',
        'updated_at',
        'promoted_at',
        'width',
        'height',
        'description',
        'alt_description',
        'category_id',
        'likes',
    ];

    public function urls() {
        return $this->hasMany(Url::class);
    }
}
