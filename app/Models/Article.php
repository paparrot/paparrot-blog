<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $body
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property string $state
 * @property ?Category $category
 * @property Tag[] $tags
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Article extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, HasUuids, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'body',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'state',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
