@extends('backend.partials.master')
@section('content')

<form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
    @csrf
       <div class="row">
           <div class="col-md-2"></div>
           <div class="col-md-6">
               <div>
               <label for="">Enter Category Name:</label>
               <input name="name" placeholder="name" type="string" class="form-control">
               </div>

           <div>
                    <button type="submit" class="btn btn-success mt-2">Create</button>
                </div>

           </div>
           <div class="col-md-4"></div>

       </div>
    </form>
@endsection