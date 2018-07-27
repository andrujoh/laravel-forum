@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <a href="#">{{$thread->creator->name}}</a> posted: 
          {{$thread->title}}
        </div>

        <div class="card-body">
          <article>
            <p>{{$thread->body}}</p>
          </article>
          <hr>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-8">
      @foreach ($thread->replies as $reply)
        @include ('threads.reply')
      @endforeach
    </div>
  </div>

  @if (auth()->check())
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form method="POST" action="{{$thread->path() . '/replies'}}">
          @csrf
          <div class="form-group">
            <textarea name="body" id="body" rows="5" class="form-control" placeholder="Add your thoughts"></textarea>
          </div>
          <button type="submit" class="btn btn-default">Post</button>
        </form>
      </div>
    </div>
  @else
    <div class="row justify-content-center">
      <div class="col-md-8">
        <p>Please <a href="{{route('login')}}">sign in</a> to comment.</p>
      </div>
    </div>
  @endif
</div>
@endsection
