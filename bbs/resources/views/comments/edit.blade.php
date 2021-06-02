@extends ('layouts.layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">Edit your comment</h1>

     <form method="POST" action="{{ route('comments.edit', ['comment' => $comment]) }}">
    @csrf
    @method('PUT')

    <fieldset class="mb-4">
     <div class="form-group">
      <label for="body">Comment</label>
      <textarea id="body" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4">{{ old('body') ?: $comment->body }}</textarea>
       @if ($errors->has('body'))
        <div class="invalid-feedback">{{ $errors->first('body') }}</div>
       @endif
     </div>

     <div class="mt-5">
      <a class="btn btn-secondary" href="{{ route('articles.show', ['post' => $comment->post_id]) }}">Cancel</a>
       <button type="submit" class="btn btn-primary">Update</button>
     </div>
    </fieldset>
    </form>
   </div>
  </div>
@endsection