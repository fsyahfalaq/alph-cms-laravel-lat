@extends('layouts.main')

@section('content')
  <!-- Blog Entries Column -->
  <div class="col-md-8">

    <h1 class="my-4">Page Heading
      <small>Secondary Text</small>
    </h1>

    <!-- Blog Post -->
    @foreach($posts as $post)
    <div class="card mb-4">
      <div class="card-body">
        <h2 class="card-title">{!! $post->title !!}</h2>
        <p class="card-text">
            {!! $post->short_desc !!}
        </p>
        <hr>
        {!! Html::image($post->image, $post->title,array('style'=>'width: 675px; height:225px;')) !!}
        <hr>
        <a href="store/show/{!! $post->id !!}" class="btn btn-primary">Read More &rarr;</a>
      </div>
      <div class="card-footer text-muted">
        {!! $post->created_at !!}
        <a href="#">{!! $post->author !!}</a>
      </div>
    </div>
    @endforeach

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li>
      </ul>
  </div>

@endsection