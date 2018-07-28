@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create a New Thread</div>

          <div class="card-body">
          <form method="POST" action="/threads">
            @csrf
              <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title">
              </div>
              <div class="form-group">
                <label for="body">Body</label>
                <textarea rows="8" class="form-control" type="text" name="body" id="body"></textarea>
              </div>
              <button class="btn btn-primary">Publish</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
