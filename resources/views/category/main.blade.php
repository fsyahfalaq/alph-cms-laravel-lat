@extends('Admin.main')

@section('content')

<!-- Breadcrumbs-->
<div class="container">
  <!-- <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.html">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Blank Page</li>
  </ol> -->
  <!-- Page Content -->
  <h1>Category Page</h1>
  <hr>

  @if(Session::has('category_update'))
  <div class="alert alert-success">
      <em>{!! session('category_update') !!}</em>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  @endif

  @if(Session::has('category_delete'))
  <div class="alert alert-success">
      <em>{!! session('category_delete') !!}</em>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  @endif

  @if(count($categories) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
        All Categories
      </div>

      <div class="panel-body">
        <table class="table table-stripped task-table">
          <thead>
            <th>Category</th>
            <th>&nbsp;</th>
          </thead>
          <thead>
            @foreach ($categories as $category)
            <tr>
              <td>
                <div>{!! $category->name !!}</div>
              </td>
              <td>
                <a href="{!! url('category/' . $category->id . '/edit') !!}">Edit</a>
              </td>
              <td>
                {!! Form::open(array('url'=>'category/' . $category->id, 'method'=>'Delete')) !!}
                {!! csrf_field() !!}
                {!! method_field('Delete') !!}
                <button class="btn btn-danger">Delete</button>
                {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
          </thead>
        </table>
      </div>
    </div>
  @endif
</div>
@endsection