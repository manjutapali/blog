<div class="blog-post">
  
  <h2 class="blog-post-title">
    <a href="/posts/{{ $post->id }}">
      {{ $post->title }}
    </a>
  </h2>
  <p class="blog-post-meta">
    {{ $post->user->name }} on
    {{ $post->created_at->toFormattedDateString() }}
  </p>
  
  <hr>
  
  <p>
    {{ $post->content }}
  </p>

  <div class="comments">
    <ul class="list-group">
      @foreach ($post->comments as $comment)
        <li class="list-group-item">
          <strong>
            {{ $comment->created_at->diffForHumans() }}: &nbsp
          </strong>
          {{ $comment->body }}
        </li>
      @endforeach
    </ul>
  </div>

  @if(auth()->check())
    <div class="card card-comment">
      <form method="POST" action="/posts/{{$post->id}}/comment">
        {{ csrf_field() }}
        <div class="form-group">
          <textarea class="form-control" placeholder="You comment" name="body" required></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  @endif

  @include('layout.errors')
    
</div>