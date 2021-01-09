@extends('admin.index')
@section('content')


<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">list of Clients </h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  <a href="{{ route('admin.users.create') }}">
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
                      <th>client name </th>
                      <th>username </th>
                      <th>recived ?</th>
                      <th>result</th>
                      <th>Edit / Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      <!-- foreach users -->
                      @foreach($users as $user)
                    <tr>
                      <td><a href="{{ route('admin.users.show' , ['user' => $user]) }}">{{$user->id }} </a></td>
                      <td>{{$user->name }}</td>
                      <td>{{$user->username}}</td>
                      <td><span class="tag tag-success">{{ $user->recived }}</span></td>
                      <td> <a href="{{ asset( $user->result) }}"> result link </a></td>
                      <td> 
                      <a href="{{route(   'admin.users.edit' ,['user' => $user] ) }}" class="btn btn-block btn-outline-primary btn-sm">Edit</a>
                     
                      <form action="{{route(   'admin.users.destroy' ,['user' => $user] ) }}" method="POST"> 
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