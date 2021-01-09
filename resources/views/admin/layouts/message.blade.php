 
@if(count($errors) > 0)
<div id="toastsContainerTopRight" class="toasts-top-right fixed">
 

  @foreach( $errors->all() as $error )
  <div class="toast bg-maroon fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header"><strong class="mr-auto">Toast Title</strong><small>Subtitle</small><button
                    data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span
                        aria-hidden="true">×</span></button></div>
            <div class="toast-body">{{$error}}</div>
        </div>
 @endforeach
 </div>
 
@endif