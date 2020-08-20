<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userXcomment extends Model
{
    protected $fillable = [
        'publication_id',
        'user_id',
      ];

      protected $table = 'user_xcomments';
}
