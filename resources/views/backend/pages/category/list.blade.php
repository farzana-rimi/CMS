@extends('backend.partials.master')
@section('content')


  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      
    </tr>
  </thead>
  <tbody>
   
  @foreach ($categories as $key=>$data)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$data->name}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

 
 

@endsection



