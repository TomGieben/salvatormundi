@extends('layouts.layout')
@section('content')
<div class="container my-5">
    <div class="title my-4">
        <h1>Activiteiten</h1>
        <hr>
    </div>
</div>
<div class="container" style="min-height: 100vh;">
    <div class="row my-4">
        <div class="row">
			@foreach($calenderitems as $calenderItem)
				<div class="col-md-3 col-12 my-3">
					<div class="card">
						<div class="card-header">
							<div class="row justify-content-between">
								<div class="col-auto">
									<div class="card-title mt-1">
										{{$calenderItem->title}}
									</div>
								</div>
								<div class="col-auto">
									@if($calenderItem->newsArticle)
										<a href="{{route('newsarticles.show', $calenderItem->newsArticle->slug)}}" class="btn btn-link text-secondary">
											Bekijken <i class="fa fa-arrow-right"></i> 
										</a>
									@endif
								</div>
							</div>
						</div>
						<div class="card-body">
							<p class="font-wieght-light">{{$calenderItem->description}}</p>
							<i class="fa fa-clock"></i> {{$calenderItem->start_at}}
						</div>
					</div>
				</div>
			@endforeach
		</div>
    </div>
    <hr>
    <div class="row justify-content-between my-4">
		<div class="col-md-5 col-12 align-self-center my-4">
			<h2 class="h1">{{$newsarticle->title}}</h2>
			<p class="h5 font-weight-light">
                @if(strlen($newsarticle->description) > 500)
                    {!! substr($newsarticle->description,0,strpos($newsarticle->description, ' ',800)) !!}
                @else
                    {!! $newsarticle->description !!}
                @endif
                <a href="{{route('newsarticles.show', $newsarticle->slug)}}" class="btn btn-link text-primary p-1 m-0">
                    Meer lezen <i class="fa fa-arrow-right"></i>
                </a>
			</p>
		</div>
        <div class="col-md-6 col-12">
            <img loading="lazy" src="{{url('/storage/img/newsarticles/'.json_decode($newsarticle->images, true)[0].'')}}" class="img-fluid rounded shadow-lg mt-2" width="685px" height="527px">
        </div>
    </div>
</div>
@endsection