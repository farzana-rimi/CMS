@extends('frontend.partials.webmaster')
@section('content')



<style>
    .container{
        display: flex;
        justify-content: center;
        
    }

    .cards{
        width: 300px;
        margin: 10px;
        border-radius: 15px;
        background-color: wheat;
    }

    .card-img img{
        width: 100%;
        border-radius: 10px 10px 0px 0px;
    }

    .card-body h2{
        text-align: center;
    }

    .card-body p{
        text-align: justify;
        margin-bottom: 10px;
        padding: 5px;
    }

    .card-footer{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-footer button{
        width: 150px;
        background: black;
        color: white;
        border-radius: 15px;
        border: 2px solid black ;
        padding: 6px;
        font-size: 17px;
        cursor: pointer;
        margin-bottom: 10px;
    }

    .card-footer button:hover{
        background-color: white;
        color: black;
        border: 2px solid black;
    }
</style>


<div class="container">

    @foreach($categories as $data)
<div class="cards">

    <div class="card-img">
        <img src="{{url('/uploads/'.$data->image)}}" alt="">
    </div>
    <div class="card-body">
        <h2>{{$data->name}}</h2>
        <p>{{$data->title}}</p>
    </div>
    <div class="card-footer">
        <button>posts</button>
    </div>
    
</div>
@endforeach

</div>

<br>
<br>
<br>
<br>
@endsection