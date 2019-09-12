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
  <h1>Create New Post</h1>

  <!-- <nav class="navbar navbar-dark bg-dark">
      <ul class="nav navbar-nav">
          <li><a href="/category">View All Categories</a></li>
      </ul>
  </nav> -->

  <!-- content -->
  <div class="panel-body">
      <!-- it show the form/input error -->
      @include('common.errors')

      <!-- It create the new post -->
      {!! Form::model($posts, array('route' => array('post.update', $posts->id), 'method'=>'PUT', 'files'=>'true')) !!}

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
      {!! Form::textarea('description', null, array('class'=>'form-control')) !!}

      {!! Form::submit('Update Post', array('class'=>'secondary-cart-btn')) !!}
      {!! Form::close() !!}
  </div>
  <!-- end content -->

</div>

@endsection