@extends('frontend.partials.webmaster')
@section('content')

<form action="{{route('createpost.store')}}" method="post" enctype="multipart/form-data">
    @csrf
       <div class="row">
           <div class="col-md-2"></div>
           <div class="col-md-6">
               <div>
               <label for="">Enter Post Title:</label>
               <input name="title" placeholder="title" type="string" class="form-control">
               </div>

               <div>
                   <label for="">Category</label>
                   <select name="category" id="" class="form-control">
                    <!-- <option value="">null</option> -->
                    @foreach($categories as $data)
                       <option value="{{$data->id}}">{{$data->name}}</option>
                      @endforeach
                   </select>
               </div>
         

               <div>
                   <label for="">Publish</label>
                   <select name="is_publish" id="" class="form-control">
                       <!-- <option value="publish">Publish</option> -->
                       <option value="draft">publish</option>
                   </select>
               </div>

               <div>
                    <label for="">Gallery</label>
                    <input name="gallery" type="file" class="form-control">
                </div>

              

               <div>
                   <label for="">Write description</label>
                   <textarea name="description" placeholder=" description" class="form-control"></textarea>
               </div>

               <div>
               <label for="">Your Name:</label>
               <input name="name" placeholder="name" type="string" class="form-control">
               </div>

               <div>
               <label for="">Profession:</label>
               <input name="profession" placeholder="" type="string" class="form-control">
               </div>
          
               <div>
               <label for="">Institute:</label>
               <input name="institute" placeholder="" type="string" class="form-control">
               </div>
          

            
                <div>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>

           </div>
           <div class="col-md-4"></div>

       </div>
    </form>
@endsection