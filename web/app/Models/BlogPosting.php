<?php

namespace App\Models;

use App\Extensions\ModelQueryBuilder;
use App\Extensions\ModelSerialization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPosting extends Model
{
    use HasFactory;
    use ModelQueryBuilder, ModelSerialization;

    protected $table = 'blog_posting';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'slug', 'content', 'description',
            'author_id', 'published_at'];
    protected $dates = ['created_at', 'modified_at', 'published_at'];
    public $routeName = 'BlogPosting';
}
