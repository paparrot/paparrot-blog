<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Article[] $articles
 */
class Tag extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
