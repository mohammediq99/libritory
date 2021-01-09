@extends('admin.index')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Client</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.users.store') }}" method="POST"  enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for=" ">  name</label>
                    <input type="text" class="form-control" id=" "  value="{{ old('name')}}" name="name" placeholder="Enter Client name">
                  </div>
                  <div class="form-group">
                    <label for=" "> user name </label>
                    <input type="text" class="form-control" id=" "  value="{{ old('username')}}" name="username" placeholder="Enter Client user name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password"  value="{{ old('password')}}" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  
                  <div class="form-group">
                    <label for=" "> Address</label>
                    <input type="text" class="form-control" id=" " name="address"  value="{{ old('address')}}" placeholder="Enter Client Address  ">
                  </div>
                  <div class="form-group">
                    <label for=" "> Phone Number</label>
                    <input type="text" class="form-control" name="phone" id=" "  value="{{ old('phone')}}" placeholder="Enter Client Phone ">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Result </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="result"  value="{{ old('result')}}" class="custom-file-input" id="exampleInputFile">
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