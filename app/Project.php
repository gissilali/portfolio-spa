<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function coverImage() {
        return $this->hasOne('App\CoverImage');
    }
}
