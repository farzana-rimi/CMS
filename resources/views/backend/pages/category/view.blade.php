@extends('backend.partials.master')
@section('content')
<h3>Category Details</h3>
<div class="container">
<div class="col-md-12 ">

<br>
<br>
<h2>{{$category->name}}</h2>
<br>
<img src="{{url('/uploads/'.$category->image)}}" width="300"  alt="img">
<br>
<br>
<p>{{$category->title}}</p>
</div>
</div>

@endsection