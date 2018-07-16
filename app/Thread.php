<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
  protected $guarded = [];

  public function path()
  {
    return "/threads/{$this->id}";
  }

  public function replies()
  {
    return $this->hasMany('App\Reply');
  }

  public function creator()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function addReply($reply)
  {
    $this->replies()->create($reply);
  }
}
