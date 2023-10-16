@extends('backend.partials.master')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

@endsection

@section('content')
<a href="{{route('post.create')}}" class="btn btn-primary my-3">Add Post</a>
  <table id='post-table' class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Gallery</th>
      <th scope="col">Description</th>
      <th scope="col">In Publish</th>
      <th scope="col">Posted by</th>
      <th scope="col">Action</th>
      <th scope="col">Accept</th>
      <th scope="col">Reject</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $key=>$data)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$data->title}}</td>
      <td>{{$data->category->name}}</td>
      <td>
          <img src="{{url('/uploads/'.$data->gallery->image)}}" width=80 alt="image">
      </td>

      <td>{{$data->description}}</td>
      <td>{{$data->is_publish}}</td>
      <td>{{$data->posted_by}}</td>
     <td>
        <a href="{{route('post.show', $data->id)}}" class="btn btn-info my-2">View</a>
        <a href="{{route('post.destroy', $data->id)}}" class="btn btn-danger my-2">Delete</a>
        <a href="{{route('post.edit',$data->id)}}" class="btn btn-success my-2">Edit</a>
     
      </td>
      <td>
      <a href="{{route('post.accept', $data->id)}}" class="btn btn-primary my-2">Accept</a>
     
      </td>
      <td>
      <a href="{{route('post.reject',$data->id)}}" class="btn btn-danger my-2">Reject</a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

 
 

@endsection

@section('scripts')
<script type="text/javascript">
	  	$(document).ready(function(){
	   		$('#post-table').DataTable();
		});
	  </script>

 <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
@endsection
