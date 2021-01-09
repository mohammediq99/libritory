@extends('front.index')
@section('content')

<!--news  -->
<section id="one" class="wrapper">
				<div class="inner">
					<div class="flex flex-3">
                    @foreach($articles as $art )
						<article>
							<header>
								<h3>{{ $art->title }}</h3>
							</header>
							<p> {!! str_limit($art->body ,50) !!}</p>
							<footer>
								<a href="{{ route('news.read' , ['id' => $art->id ] ) }}" class="button special">More</a>
							</footer>
						</article>
					 @endforeach
						 
					</div>
				</div>
			</section>

 <!-- Stuff  -->
		
		<!-- Two -->
        <section id="two" class="wrapper style1 special">
				<div class="inner">
					<header>
						<h2>Our Stuff </h2>
						<!-- <p>Semper suscipit posuere apede</p> -->
					</header>
					<div class="flex flex-4">
                    @foreach($emps as $emp)
						<div class="box person">
							<div class="image round">
								<img src="{{asset($emp->image)}}" alt="{{$emp->name}}" />
							</div>
							<h3>{{ $emp->name }}</h3>
							<p>{{ $emp->position }}</p>
						</div>   
                    @endforeach
					</div>
				</div>
			</section>



@endSection