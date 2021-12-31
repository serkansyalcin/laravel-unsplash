<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_at',
        'updated_at',
        'promoted_at',
        'width',
        'height',
        'description',
        'alt_description',
        // 'urls',
        // 'links',
        'category_id',
        'likes',
    ];
}
