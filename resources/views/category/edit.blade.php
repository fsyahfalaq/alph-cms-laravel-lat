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
<h1>Edit Category</h1>
<hr>

<!-- content -->
<div class="panel-body">
    <!-- it show the form/input error -->
    @include('common.errors')

    <!-- It create the new category -->
    {!! Form::model($categories, array('route' => array('category.update', $categories->id), 'method'=>'PUT')) !!}

    {!! Form::label('name', 'Name:') !!}

    {!! Form::text('name', null, array('class'=>'form-control')) !!}

    {!! Form::submit('Update Category', array('class'=>'secondary-cart-btn')) !!}
    {!! Form::close() !!}
</div>
<!-- end content -->

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="http://">View All Categories</a></li>
        <li><a href="category/create">Create New Category</a></li>
    </ul>
</nav>

@endsection