<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasTags;
    use Filterable;
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
