@if (count($errors) > 0)
<!-- form Error list -->

<div class="alert alert-danger">
    <strong>Something is wrong</strong>

    <br><br>

    <ul>
        @foreach ($errors->all() as $error)
        <li>{!! $error !!}</li>
        @endforeach
    </ul>
</div>
@endif