<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[Fillable('user_id', 'category_id', 'title', 'image', 'is_active', 'is_featured')]
class Post extends Model
{
    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class, 'category_id');
    }

    public function tag(): BelongsTo
    {
        return $this->BelongsTo(Tag::class, 'tag_id');
    }
}
