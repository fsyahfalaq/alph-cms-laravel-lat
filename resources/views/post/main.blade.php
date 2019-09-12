@extends('Admin.main')

@section('content')

<div class="container">

  <!-- Page Content -->
  <h1>Post Page</h1>
  <hr>

  @if(Session::has('post_update'))
  <div class="alert alert-success">
    <em>{!! session('post_update') !!}</em>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  @endif

  @if(Session::has('post_delete'))
  <div class="alert alert-success">
    <em>{!! session('post_delete') !!}</em>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  @endif

  @if(count($posts) > 0)
  <div class="panel panel-default">
    <div class="panel-heading">
      All Posts
    </div>

    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-stripped task-table">
          <thead>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Images</th>
            <th>Description</th>
            <th>&nbsp;</th>
          </thead>
          <thead>
            @foreach ($posts as $post)
            <tr id="tr-{!! $post->id !!}">
              <td>
                <div>{!! $post->title !!}</div>
              </td>
              <td>
                <div>{!! $post->author !!}</div>
              </td>
              <td>
                <div>{!! $post->category_id !!}</div>
              </td>
              <td>
                <div>{!! Html::image($post->image, $post->title, array('width'=>'60')) !!}</div>
              </td>
              <td>
                <div>{!! $post->short_desc !!}</div>
              </td>
              <td>
                <a href="{!! url('post/' . $post->id . '/edit') !!}" class="btn btn-warning">Edit</a>
              </td>
              <td>
                {!! Form::open(array('url'=>'post/' . $post->id, 'method'=>'Delete')) !!}
                {!! csrf_field() !!}
                {!! method_field('Delete') !!}
                <button class="btn btn-danger" id="btn-delete" data-token="{{ csrf_token() }}">Delete</button>

                {!! Form::close() !!}

              </td>
            </tr>
            @endforeach
          </thead>
        </table>
      </div>

      <div id="edit-coba">

      </div>

    </div>
  </div>
  @endif

</div>
@endsection