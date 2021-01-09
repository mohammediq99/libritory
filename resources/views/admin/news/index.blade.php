@extends('admin.index')
@section('content')
<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">news </h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  <a href="{{ route('admin.news.create') }}">
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
                      <th> title </th>
                      <th>body </th>
                       <th>Image</th>
                      <th>Edit / Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      <!-- foreach users -->
                      @foreach($news as $article)
                    <tr>
                      <td><a href="{{ route('admin.news.show' , ['news' => $article]) }}">{{$article->id }} </a></td>
                      <td>{{$article->title }}</td>
                      <td>{{  str_limit($article->body,10) }}</td>
                       <td> <img src="{{ asset( $article->image) }}" style="width:200px;height:150px;"/></td>
                      <td> 
                      <a href="{{route(   'admin.news.edit' ,['news' => $article] ) }}" class="btn btn-block btn-outline-primary btn-sm">Edit</a>
                      <form action="{{route(   'admin.news.destroy' ,['news' => $article] ) }}" method="POST"> 
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