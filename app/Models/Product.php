<?php

namespace App\Models;

use App\Traits\Models\HasThumbnail;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    use HasThumbnail;


    protected $fillable = [
        'slug',
        'title',
        'brand_id',
        'thumbnail',
        'price',
        'on_home_page',
        'sorting',
    ];

    protected function thumbnailDir(): string
    {
        return 'products';
    }

    public function scopeHomepage(Builder $query)
    {
        $query->where('on_home_page', true)
            ->orderBy('sorting')->limit(6);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Product $product) {
            $product->slug = $product->slug ?? str($product->title)->slug();
        });
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }


}
