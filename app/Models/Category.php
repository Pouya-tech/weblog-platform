<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name','slug','is_active','is_featured'])]
class Category extends Model
{
    

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'category_tag')
            ->withTimestamps();
    }
}
