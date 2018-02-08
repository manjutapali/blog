<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <a class="blog-nav-item active" href="/">Home</a>
      <a class="blog-nav-item" href="/posts/create">Create post</a>
      <a class="blog-nav-item" href="#">Press</a>
      <a class="blog-nav-item" href="#">New hires</a>

      @if(auth()->check())
      	<a class="blog-nav-item" style="float: right;" href="#">{{ auth()->user()->name }}</a>
      @endif
    </nav>
  </div>
</div>