@extends('admin.index')
@section('content')

<div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                   <img class="profile-user-img img-fluid img-circle" src="{{ assets($user->image)}}" alt="">
                  </div>
                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                <p class="text-muted text-center">{{ $user->degree }}</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Address </b> <a class="float-right">{{ $user->address }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone Number</b> <a class="float-right">{{ $user->phone }}</a>
                  </li>
                  
                </ul>
                <a href="{{ route('admin.users.recive', ['id' => $user->id ])}}" class="btn btn-primary btn-block"><b>Recive</b></a>
              </div>
              <!-- /.card-body -->
            </div>
@endsection