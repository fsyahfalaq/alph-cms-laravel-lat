@extends('layouts.main')

@section('content')
<!-- Blog Entries Column -->
<div class="col-md-8">

  <!-- Blog Post -->
  <div class="container mt-4">
  @foreach($posts as $post)
  <div class="card mb-4">
    <div class="card-body">
      <h2 class="card-title">{!! $post->title !!}</h2>
      <p class="card-text">
        {!! $post->short_desc !!}
      </p>
      <hr>
      {!! Html::image($post->image, $post->title,array('style'=>'width: 675px; height:225px;', 'class'=>'img-thumbnail')) !!}
      <hr>
      <a href='{!! url("article/{$post->id}") !!}' class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
      {!! $post->created_at !!}
      <a href="#">{!! $post->author !!}</a>
    </div>
  </div>
  @endforeach
  </div>

  <!-- Pagination -->
  {!! $posts->links() !!}
</div>

<!-- Sidebar Widgets Column -->
    <!-- Search Widget -->
    <div class="col-md-4">

    <div class="card my-4">
        <h5 class="card-header">Search</h5>
        {!! Form::open(array('url'=>'article/search', 'method'=>'get')) !!}
        <div class="card-body">
          <div class="input-group">
            {!! Form::text('keyword', null, array('placeholder'=>'Serach for..', 'class'=>'form-control')) !!}
            <span class="input-group-btn">
              {!! Form::button('search', array('class'=>'btn btn-secondary')) !!}
            </span>
          </div>
        </div>
        {!! Form::close() !!}
      </div>

      <!-- Categories Widget -->
      <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                @foreach ($categories as $category)
                <li>
                  <a href='{!! url("article/category/{$category->id}") !!}'>{!! $category->name !!}</a>
                </li>
                @endforeach

              </ul>
            </div>
        </div>
      </div>

    </div>

@endsection