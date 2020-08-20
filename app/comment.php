<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = [
        'publication_id',
        'content',
        'status',
      ];

      protected $table = 'comments';

      public function publications()
      {
          return $this->belongsToMany('App\comment');
      }

}
