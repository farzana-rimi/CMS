@extends('frontend.partials.webmaster')
@section('content')

<div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 ">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                   
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">{{$post->title}}</h2>
                            <br>
                            <img src="{{url('/uploads/'.$post->gallery->image)}}" style="width:80%" alt="image">
                            <br>
                            <br>
                            <h3 class="post-subtitle">{{$post->description}}</h3>
                            
                        </a>
                        <p class="post-meta">
                            Posted by
                            <br>
                            {{$post->name}}
                            <br>
                            {{$post->profession}}
                            <br>
                            {{$post->institute}}
                         <br>
                         {{$post->created_at}}
                         </p>
                    </div>
                    
                    <!-- Divider-->
                    <hr class="my-4" />
              
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                    <!-- <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div> -->
                    
                </div>
              
            </div>
           <div class="col-lg-12 mb-5">
         <form action="{{route('comment',$post->id)}}" method="post">
            @csrf
         <div class="form-group">
                <label for="">Comment</label>
                <textarea name="comment" id="" class="form-control" cols="20" rows="3" placeholder="enter comments here..."></textarea>
                <button type="submit" class="btn btn-sm btn-info mt-3" style="float:right">Send</button>
            </div>
         </form>

           </div>
           <br>

           <hr class="my-4" />

          

<section style="background-color: #eee;">

  <div class="container my-5 py-5">
  <h4 class="mb-4">{{count($comment)}} comments</h4>
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="card">
          @foreach($comment as $data)
          <div class="card-body">
            <div class="d-flex flex-start align-items-center">
              <img class="rounded-circle shadow-1-strong me-3"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                height="60" />
              <div>
                <h5 class="">{{$data->user->name}}</h5>
                
                <span>  {{$data->created_at}}</span>
              
              </div>
            </div>

            <p class="mt-3 mb-4 pb-2">
           {{$data->comment}}
            </p>

            <!-- <div class="small d-flex justify-content-start">
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="far fa-thumbs-up me-2"></i>
                <p class="mb-0">Like</p>
              </a>
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="far fa-comment-dots me-2"></i>
                <p class="mb-0">Comment</p>
              </a>
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="fas fa-share me-2"></i>
                <p class="mb-0">Share</p>
              </a>
            </div> -->
          </div>
          @endforeach
          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <!-- <div class="d-flex flex-start w-100">
              <img class="rounded-circle shadow-1-strong me-3"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                height="40" />
              <div class="form-outline w-100">
                <textarea class="form-control" id="textAreaExample" rows="4"
                  style="background: #fff;"></textarea>
                <label class="form-label" for="textAreaExample">Reply</label>
              </div> -->
            </div>
            <!-- <div class="float-end mt-2 pt-1">
              <button type="button" class="btn btn-primary btn-sm">Send</button>
              <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
            
        </div>
@endsection