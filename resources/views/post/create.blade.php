@extends('Admin.main')

@section('content')

<!-- Breadcrumbs-->
<div class="container">
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  <!-- <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.html">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Blank Page</li>
  </ol> -->
  <!-- Page Content -->
  <h1>Create New Post</h1>

  <!-- <nav class="navbar navbar-dark bg-dark">
      <ul class="nav navbar-nav">
          <li><a href="/category">View All Categories</a></li>
      </ul>
  </nav> -->

  @if(Session::has('post_create'))
  <div class="alert alert-success">
    <em>{!! session('post_create') !!}</em>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  @endif

  <!-- content -->
  <div class="panel-body">
    <!-- it show the form/input error -->
    @include('common.errors')

    <!-- It create the new post -->
    {!! Form::open(array('url'=>'post', 'files'=>'true')) !!}

    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', $categories, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, array('class'=>'form-control')) !!}

    {!! Form::label('author', 'Author:') !!}
    {!! Form::text('author', null, array('class'=>'form-control')) !!}

    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image', null, array('class'=>'form-control')) !!}
    <br>
    {!! Form::label('short_desc', 'Short Desc:') !!}
    {!! Form::textarea('short_desc', null, array('class'=>'form-control')) !!}

    {!! Form::label('description', 'Description:') !!}
    <textarea name="description" id="editor">

      </textarea>
    <!-- {!! Form::textarea('description', null, array('class'=>'form-control')) !!} -->

    {!! Form::submit('Create Post', array('class'=>'secondary-cart-btn')) !!}
    {!! Form::close() !!}
  </div>
  <!-- end content -->
  <script>
    ClassicEditor
      .create(document.querySelector('#editor'))
      .catch(error => {
        console.error(error);
      });
  </script>
</div>

@endsection