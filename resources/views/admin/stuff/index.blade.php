@extends('admin.index')
@section('content')


<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">list of Stuff members </h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  <a href="{{ route('admin.stuff.create') }}">
                  <i class="fas fa-user-plus"></i>

                  </a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 100%;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th> name </th>
                      <th>Degree </th>
                       <th>Image</th>
                      <th>Edit / Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      <!-- foreach users -->
                      @foreach($stuff as $user)
                     <tr>
                      <td><a href="{{ route('admin.stuff.show' , ['stuff' => $user]) }}">{{$user->id }} </a></td>
                      <td>{{$user->name }}</td>
                      <td>{{$user->position}}</td>
                       <td> <img src="{{ asset( $user->image) }}" style="width:200px;height:150px;"/></td>
                      <td> 
                      <a href="{{route(   'admin.stuff.edit' ,['stuff' => $user] ) }}" class="btn btn-block btn-outline-primary btn-sm">Edit</a>
                     
                      <form action="{{route(   'admin.stuff.destroy' ,['stuff' => $user] ) }}" method="POST"> 
                       @csrf
                       @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                       
                      </td>
                    </tr>
                    @endforeach
                    <!--  end foreach  -->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


@endsection