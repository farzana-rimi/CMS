@extends('backend.partials.master')
@section('content')

<form action="{{route('category.update',$find->id)}}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
       <div class="row">
           <div class="col-md-2"></div>
           <div class="col-md-6">
               <div>
                    <label for="">Enter Category Name:</label>
                    <input name="name" placeholder="name" value="{{$find->name}}" type="string" class="form-control">
               </div>

               <div>
                    <label for="">Enter Category Image</label>
                    <input type="file" name="category_img" placeholder="image" class="form-control"> 
               </div>

               <div>
                    <label for="">Enter Title</label>
                    <input type="text" name="title" value="{{$find->title}}" placeholder="title" class="form-control">
               </div>

                <div>
                    <button type="submit" class="btn btn-success mt-2">Create</button>
                </div>

           </div>
           <div class="col-md-4"></div>

       </div>
    </form>
@endsection