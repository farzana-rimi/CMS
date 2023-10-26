@extends('frontend.partials.webmaster')
@section('content')

<div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @foreach($latestpost as $data)
                    <div class="post-preview">
                        <a href="{{route('singlepost.show',$data->id)}}">
                            <h2 class="post-title">{{$data->title}}</h2>
                            <h3 class="post-subtitle"></h3>
                            <img src="{{url('/uploads/'.$data->gallery->image)}}" width=60 alt="image">
                        </a>
                        <p class="post-meta">
                            Posted by
                            {{$data->name}}
                            <br>
                            {{$data->institute}}
                         {{$data->profession}}
                         {{$data->created_at}}
                         </p>
                    </div>
                    @endforeach
                    <!-- Divider-->
                    <hr class="my-4" />
              
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                    
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
        </div>
@endsection