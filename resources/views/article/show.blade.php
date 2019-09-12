@extends('layouts.main')

@section('content')

<!-- Post Content Column -->
<div class="col-lg-8">

  <!-- Title -->
  <h1 class="mt-4">{!! $post->title !!}</h1>

  <!-- Author -->
  <p class="lead">
    by <a href="#">{!! $post->author !!}</a>
  </p>

  <hr>

  <!-- Date/Time -->
  <span>Dipublikasikan pada: {!! $post->created_at !!}</span>

  <hr>

  <!-- Preview Image -->
  {!! Html::image($post->image, $post->title,array('style'=>'width: 675px; height:225px;', 'class'=>'img-fluid')) !!}
  <hr>

  <!-- Post Content -->
  <p>
    {!! $post->description !!}
  </p>

  <hr>

  <!-- ajax for hide commets -->
  <script>
    $(document).ready(function() {
      $("#comment").hide();
      $("#btn-comment").click(function () {
        $("#comment").show();
        $("#btn-comment").hide();
      })
    });
  </script>

  
  {!! Form::button('Show Comments', array('id'=>'btn-comment', 'class'=>'btn btn-secondary')) !!}

  <!-- Comments Form -->
  <div id="comment">
    <div class="card my-4">
      <h5 class="card-header">Leave a Comment:</h5>
      <div class="card-body">
        <form>
          <div class="form-group">
            <textarea class="form-control" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

    <!-- Single Comment -->
    <div class="media mb-4">
      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
      <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
      </div>
    </div>

    <!-- Comment with nested comments -->
    <div class="media mb-4">
      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
      <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

        <div class="media mt-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>

        <div class="media mt-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pagination -->
  <!-- {//!! $post->links() !!} -->
</div>

<!-- Sidebar Widgets Column -->
<div class="col-md-4">

  <!-- Search Widget -->
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
</div>


@endsection