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
  <h1>Create New Category</h1>

  <!-- <nav class="navbar navbar-dark bg-dark">
      <ul class="nav navbar-nav">
          <li><a href="/category">View All Categories</a></li>
      </ul>
  </nav> -->

  @if(Session::has('category_create'))
  <div class="alert alert-success">
      <em>{!! session('category_create') !!}</em>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  @endif

  <!-- content -->
  <div class="panel-body">
      <!-- it show the form/input error -->
      @include('common.errors')

      <!-- It create the new category -->
      {!! Form::open(array('url'=>'category')) !!}

      {!! Form::label('name', 'Name:') !!}

      {!! Form::text('name', null, array('class'=>'form-control')) !!}

      {!! Form::submit('Create Category', array('class'=>'secondary-cart-btn')) !!}
      {!! Form::close() !!}
  </div>
  <!-- end content -->

</div>

@endsection