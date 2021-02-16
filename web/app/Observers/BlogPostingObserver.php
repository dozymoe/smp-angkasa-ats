<?php

namespace App\Observers;

use App\Models\BlogPosting;
use Str;

class BlogPostingObserver
{
    public function creating(BlogPosting $object)
    {
        $object->slug = Str::slug($object->title, '-');
    }

    public function updating(BlogPosting $object)
    {
        $object->slug = Str::slug($object->title, '-');
    }
}
