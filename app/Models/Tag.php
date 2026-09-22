<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name', 'slug', 'is_active'])]
class Tag extends Model
{
    // public function categories(): BelongsToMany
    // {
    //     return $this->belongsToMany(Category::class, 'category_tag')
    //         ->withTimestamps();
    // }
}
