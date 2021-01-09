@extends('admin.index')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Client</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.news.update' , ['news' => $article->id]) }}" method="post"  enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')

                  <div class="card-body">
                  <div class="form-group">
                    <label for=" ">  name</label>
                    <input type="text" class="form-control" id=" "  value="{{ $article->title  }}" name="title" placeholder="Enter Client name">
                  </div>
                  <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Summernote
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body"> 
             <textarea name="body" id="" cols="140" rows="10"></textarea>
             </div>
            <div class="card-footer">
              Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples and information about the plugin.
            </div>
          </div>
                 
                  <div class="form-group">
                    <label for="exampleInputFile">Image </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image"  value="{{ $article->image }}" class="custom-file-input" id="exampleInputFile">
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