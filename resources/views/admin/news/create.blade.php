@extends('admin.index')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new Article </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.news.store') }}" method="POST"  enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for=" ">  title</label>
                    <input type="text" class="form-control" id=" "  value="{{ old('title')}}" name="title" placeholder="Enter  Title">
                  </div>
    
                
                  <div class="card card-outline card-info">
             <div class="card-header">
              <h3 class="card-title">
                Article Body
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <textarea name="body" id="" cols="140" rows="10"></textarea>
               </div>
            <div class="card-footer">
             </div>
          </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image"  value="{{ old('Image')}}" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div> 
                    </div>
                  </div>
                  <div class="form-check">
                     
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

@endsection