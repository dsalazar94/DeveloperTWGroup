<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publication extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
      ];

      protected $table = 'publications';

      public function comments()
      {
          return $this->belongsToMany('App\publication');
      }

}
