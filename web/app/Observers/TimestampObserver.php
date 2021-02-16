<?php

namespace App\Observers;

use Auth;
use Illuminate\Database\Eloquent\Model;

class TimestampObserver
{
    public function creating(Model $object)
    {
        $user = Auth::user();
        if ($user && $object->isFillable('created_by'))
        {
            $object->created_by = $user->getId();
        }
        if ($user && $object->isFillable('updated_by'))
        {
            $object->updated_by = $user->getId();
        }
    }

    public function updating(Model $object)
    {
        $user = Auth::user();
        if ($user && $object->isFillable('updated_by'))
        {
            $object->updated_by = $user->getId();
        }
    }
}
