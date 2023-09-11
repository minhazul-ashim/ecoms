<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "short_desc",
        "brief_desc",
        "price",
        "category_id",
        "category_name",
        "subcat_id",
        "subcat_name",
        "slug",
        "stock",
        "image"
    ];
}
