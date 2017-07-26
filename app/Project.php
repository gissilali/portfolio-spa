<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['description', 'title', 'complete', 'date_completed'];

    public function coverImage() {
        return $this->hasOne('App\CoverImage');
    }
}
