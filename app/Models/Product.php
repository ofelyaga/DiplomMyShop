<?php

namespace App\Models;

use App\Traits\Models\HasThumbnail;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;


class Product extends Model
{
    use HasFactory;
    use HasThumbnail;
    use Searchable;

    protected $fillable = [
        'slug',
        'title',
        'brand_id',
        'thumbnail',
        'price',
        'on_home_page',
        'sorting',
        'text'
    ];

    protected function thumbnailDir(): string
    {
        return 'products';
    }

    /*#[SearchUsingFullText(['title', 'text'])]
    public function toSearchableArray(): array
    {
        return [
            //'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,

        ];
    }*/

    public function scopeFiltered(Builder $query)
    {
        $query->when(request('filters.brands'), function (Builder $q) {
            $q->whereIn('brand_id', array_keys(request('filters.brands')));
        })->when(request('filters.price'), function (Builder $q) {
            $q->whereBetween('price', [
                request('filters.price.from', 0),
                request('filters.price.to', 100000)
            ]);
        });
    }

    public function scopeSorted(Builder $query)
    {
        $query->when(request('sort'), function (Builder $q) {
            $filters = ['price', '-price', 'title', '-title'];
            $column = request('sort');
            if (in_array($column, $filters)) {
                $direction = 'ASC';
                if (str_starts_with($column, '-')) {
                    $direction = 'DESC';
                    $column = mb_substr($column, 1);
                }
                $q->orderBy($column, $direction);
            }
        });
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
