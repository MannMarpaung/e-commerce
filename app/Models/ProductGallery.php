<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'protected_id',
        'image',
        'is_featured'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
