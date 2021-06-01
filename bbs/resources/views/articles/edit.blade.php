@extends('layouts.layout')

@section('content')
 <div class="container mt-4">
  <div class="border p-4">
   <div class="mb-4 text-left">
    <a class="btn btn-success" href="{{ route('articles.index') }}">Back to Home</a>
   </div>   

 <div class="container mt-4">
  <div class="border p-4">
   <h1 class="h5 mb-4">Edit an Article</h1>
      <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}">
    @csrf
    @method('PUT')

     <fieldset class="mb-4">
     <div class="form-group">
      <label for="title">Title</label>
      <input id="title" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') ?: $article->title }}" type="text">
      @if ($errors->has('title'))
       <div class="invalid-feedback">
        {{ $errors->first('title') }}
       </div>
       @endif
     </div>

     <div class="form-group">
      <label for="body">Content</label>
      <textarea id="body" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4">{{ old('body') ?: $article->description }}</textarea>
       @if ($errors->has('body'))
        <div class="invalid-feedback">
         {{ $errors->first('body') }}
        </div>
       @endif
      </div>

     <div class="mt-5">
      <a class="btn btn-secondary" href="{{ route('articles.show', ['article' => $article]) }}">Cancel</a>
       <button type="submit" class="btn btn-primary">Update an article</button>
     </div>
    </fieldset>
    </form>
   </div>
  </div>
@endsection
