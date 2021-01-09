@extends('front.index')
@section('content')



		<!-- Three -->
        <section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2>{{ $art->title }}</h2>
 					</header> 
					 <div>
					 <img src="{{ asset($art->image) }}" width="50%" />
					 </div>
					 <br>
					 <br>
					 <br>
                    {!! $art->body !!}
					</div>
				</div>
			</section>


@endsection