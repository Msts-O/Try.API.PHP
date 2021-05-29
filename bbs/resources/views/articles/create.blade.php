@extends('layouts.layout')

@section('content')
   <div class="container mt-4">
     <div class="border p-4">
      <h1 class="h5 mb-4">New Post</h1>
     <form method="POST" action="{{ route('articles.store') }}">
 @csrf

     <fieldset class="mb-4">
      <div class="form-group">
       <label for="title">
        Title
       </label>
      <input id="title" name="title" class="form-control {{ $errors->has('title') ?  'is-invalid' :''}}" type="text">
       @if($errors->has('title'))
        <div class="invalid-feedback">
         {{ $errors->first('title') }}
        </div>
       @endif
      </div>

      <div class="form-group">
       <label for="body">Text</label>

     <textarea id="body" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4">
      {{ old('body') }}
     </textarea>
      @if($errors->has('body'))
       <div class="invalid-feedback">
        {{ $errors->first('body') }}
       </div>
       @endif
      </div>

      <div class="mt-5">
       <a class="btn btn-secondary" href="articles">Cancel</a>
       <button type="submit" class="btn btn-primary">Post</button>
      </div>
     </fieldset>
    </form>
   </div>
  </div>
@endsection
