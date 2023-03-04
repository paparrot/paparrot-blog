<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $body
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Project extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasUuids;

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
    ];
}
