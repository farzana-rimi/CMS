@extends('backend.partials.master')
@section('content')

<a class="btn btn-success" href="{{route('category.create')}}">Add Category</a>
<br>
<br>
<br>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
   
  @foreach ($categories as $key=>$data)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$data->name}}</td>
      <td>
      <img src="{{url('/uploads/'.$data->image)}}" width=80 alt="image">
      </td>
      <td>{{$data->title}}</td>
      <td>

      <a class="btn btn-warning" href="">Edit</a>
      <a  class="btn btn-info" href="{{route('category.view',$data->id)}}">View</a>
      <a class="btn btn-danger"  href="">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

 
 

@endsection



