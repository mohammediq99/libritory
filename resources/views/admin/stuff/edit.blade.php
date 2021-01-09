@extends('admin.index')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Client</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.stuff.update' , ['stuff' => $user->id]) }}" method="post"  enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')

                  <div class="card-body">
                  <div class="form-group">
                    <label for=" ">  name</label>
                    <input type="text" class="form-control" id=" "  value="{{ $user->name  }}" name="name" placeholder="Enter Client name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Degree</label>
                    <input type="text" class="form-control" name="degree"  value="{{  $user->position  }}" id="exampleInputPassword1" placeholder="Password">
                  </div>
                   
                  <div class="form-group">
                    <label for=" "> Phone Number</label>
                    <input type="text" class="form-control" name="phone" id=" "  value="{{ $user->phone }}" placeholder="Enter Client Phone ">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image"  value="{{ $user->image }}" class="custom-file-input" id="exampleInputFile">
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