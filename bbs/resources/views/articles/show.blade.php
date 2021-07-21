
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


      @forelse($article->comments as $comment)
       <div class="border-top p-4">
        <time class="text-secondary">
        　{{ $comment->created_at->format('Y.m.d H:i') }}
        </time>
          <p class="mt-2">
            {!! nl2br(e($comment->comment)) !!}
         　</p>
        </div>

        @empty
         <p>コメントはまだありません。</p>
      　@endforelse

         <form class="mb-4" method="POST" action="{{ route('comment.store'),['comment' => $comment]}}">
          @csrf

         <input name="article_id" type="hidden" value="{{ $article->id }}">

          <div class="form-group">
           <label for="subject">Name</label>

         <input id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" type="text">
            @if ($errors->has('name'))
              <div class="invalid-feedback">
                {{ $errors->first('name') }}
              </div>
            @endif
           </div>

          <div class="form-group">
           <label for="comment">Content</label>

           <textarea id="comment" name="comment" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" rows="4">{{ old('comment') }}</textarea>
             @if ($errors->has('comment'))
               <div class="invalid-feedback">
                {{ $errors->first('comment') }}
               </div>
             @endif
           </div>

           <div class="mt-4">
             <button type="submit" class="btn btn-primary">To comment here! </button>
           </div>
          </form>
         </div>
    </div>
@endsection


