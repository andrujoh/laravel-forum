<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
  use DatabaseMigrations;

  protected $thread;

  public function setUp()
  {
    parent::setUp();
    $this->thread = create('App\Thread');
  }

  /** @test */
  function a_thread_can_make_a_string_path()
  {
    $thread = create('App\Thread');

    // dd("/threads/{$thread->channel->slug}/{$thread->id}");
    // dd($thread->path());
    $this->assertEquals("/threads/" . $thread->channel->slug . "/" . $thread->id, $thread->path());
  }

  /** @test */
  function a_thread_has_a_creator()
  {
    $this->assertInstanceOf('App\User', $this->thread->creator);
  }

  /** @test */
  function a_thread_has_replies()
  {
    $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
  }

  /** @test */
  function a_thread_can_add_a_reply()
  {
    $this->thread->addReply([
      'body' => 'Great',
      'user_id' => 1
    ]);

    $this->assertCount(1, $this->thread->replies);
  }

  /** @test */
  function a_thread_belongs_to_a_channel()
  {
    $thread = create('App\Thread');

    $this->assertInstanceOf('App\Channel', $thread->channel);
  }
}
