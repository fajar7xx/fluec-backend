<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class ProductGallery extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'product_galleries';
    protected $fillable = [
        'product_id',
        'url'
    ];

    /**
     * get full url image for api
     * @param $url
     * @return string
     */
    public function getUrlAttribute($url)
    {
        return config('app.url') . Storage::url($url);
    }
}
