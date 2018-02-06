<div class="blog-post">
  
  <h2 class="blog-post-title">
    <a href="/posts/{{ $post->id }}">
      {{ $post->title }}
    </a>
  </h2>
  <p class="blog-post-meta"> 
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
    
</div>