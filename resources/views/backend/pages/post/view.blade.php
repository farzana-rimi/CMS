@extends('backend.partials.master')
@section('content')

<br>
<h2>Post Details</h2>
<br>
<br>
<div class="container">
    <p>Category: {{$show->category->name}}</p>
  <p>User Name: {{$show->title}}</p>
  <img src="{{url('/uploads/'.$show->gallery->image)}}" width=80 alt="image">
  <br>
  <br>
  <p>Description: {{$show->description}}</p>
  <p>Is publish: {{$show->is_publish}}</p>
  <p>Published by: {{$show->name}}</p>
  <p>Date: {{$show->created_at}}</p>
 
</div>
@endsection
