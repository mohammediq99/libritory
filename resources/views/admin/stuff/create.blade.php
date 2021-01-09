@extends('admin.index')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Member to Stuff </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.stuff.store') }}" method="POST"  enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for=" ">  name</label>
                    <input type="text" class="form-control" id=" "  value="{{ old('name')}}" name="name" placeholder="Enter  name">
                  </div>
    
                  <div class="form-group">
                    <label for="">Degree</label>
                    <input type="text" class="form-control" name="degree"  value="{{ old('degree')}}" id="" placeholder="Degree">
                  </div>
                  
                  <div class="form-group">
                    <label for=" "> Address</label>
                    <input type="text" class="form-control" id=" " name="address"  value="{{ old('address')}}" placeholder="Enter   Address  ">
                  </div>
                  <div class="form-group">
                    <label for=" "> Phone Number</label>
                    <input type="text" class="form-control" name="phone" id=" "  value="{{ old('phone')}}" placeholder="Enter   Phone ">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image"  value="{{ old('image')}}" class="custom-file-input" id="exampleInputFile">
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