<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Codec\TimestampLastCombCodec;

class product extends Model
{
    protected $table = "products";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'price',
        'sale',
        'image',
        'extra_images',
        'detailed_description',
        'short_description',
        'stock_quantity',
        'rating',
        'status',
        'views',
        'tags',
        'sold',
        'category_id',
    ];


    public static function boot()
    {
        parent::boot();
        static::deleted(function ($model) {
            Log::info("da xoa roi nha");
        });
    }
}
