@extends('frontend.partials.webmaster')
@section('content')

<style>

    .flex-box{

        display: flex;
    }
</style>
<div class="border rounded-5">
<section class="p-4 text-center mb-4 w-100 ">
<div class="row row-cols-3 g-3" >
<div class="col">
    @foreach($categories as $data)
    
<a href="{{route('post.category',$data->id)}}">
<div class="card" style="width: 8rem;">
  <img class="card-img-top" src="{{url('/uploads/'.$data->image)}}" width=40 alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$data->name}}</h5>
    <p class="card-text">{{$data->title}}</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
</a>
@endforeach
</div>
</div>
</section>
</div>
@endsection