
@extends('layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <div class="mb-4 text-left">
                <a class="btn btn-success" href="{{ route('articles.index') }}">Back to Home</a>
            </div>

    <div class="mb-4 text-right">
      @if(optional(Auth::user())->id=== $article->user_id)
       <a class="btn btn-primary" href="{{ route('articles.edit', ['article' => $article]) }}">Edit</a>
       <form style="display: inline-block;" method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
      @csrf
      @method('DELETE')
       <button class="btn btn-danger">delete</button>
       </form>
      @endif
    </div>

      <h1 class="h5 mb-4">{{ $article->title }}</h1>
       <p class="mb-5">{!! nl2br(e($article->body)) !!}</p>
       <section>
        <h2 class="h5 mb-4">Comments</h2>
        <form class="mb-4" method="POST" action="{{ route('articles.index') }}">
       @csrf
        <input name="article_id" type="hidden" value="{{ $article->id }}">

{{-- comment_name--}}
       <form class="mb-4" method="POST" action="{{ route('comments.store')}}">
       @csrf
        <div class="form-group">
         <label for="subject">Your Name</label>
         <input id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" type="text">
          @if ($errors->has('name'))
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
          @endif
        </div>

        <div class="form-group">
         <label for="body">Content</label>
         <textarea id="body" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4">{{ old('body') }}</textarea>
          @if($errors->has('body'))
           <div class="invalid-feedback">{{ $errors->first('body') }}</div>
          @endif
           </div>
           <div class="mt-4">
             <button type="submit" class="btn btn-primary">To comment here.</button>
           </div>
         </form>
            

         @if (session('comment_status'))
          <div class="alert alert-success mt-4 mb-4">
            {{ session('comment_status') }}
          </div>
         @endif
      </div>
     </div>
@endsection



