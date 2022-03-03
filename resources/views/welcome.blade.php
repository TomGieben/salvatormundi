@extends('layouts.layout')
@section('content')
<div class="background-image" id="carousel">
  <div class="container" style="height: 100vh;">
      <div class="row">
          <div class="col-12 text-center py-5">
            <div class="title-blur">
              <h1 class="h1 font-weight-bold text-white title">Gilde Salvator Mundi</h1>
            </div>
              <div class="content" onclick="window.scroll({top:1000, left:0, behavior:'smooth'})">
                <svg id="more-arrows">
                  <polygon class="arrow-top" points="37.6,27.9 1.8,1.3 3.3,0 37.6,25.3 71.9,0 73.7,1.3 "/>
                  <polygon class="arrow-middle" points="37.6,45.8 0.8,18.7 4.4,16.4 37.6,41.2 71.2,16.4 74.5,18.7 "/>
                  <polygon class="arrow-bottom" points="37.6,64 0,36.1 5.1,32.8 37.6,56.8 70.4,32.8 75.5,36.1 "/>
                </svg>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="container-fluid px-md-5 py-md-5">
	<h2 class="h1 text-center">Laatste nieuws</h2>
	<hr>
	<div class="row">
		@foreach($newsArticles as $newsArticle)
			<div class="col-sm-6 col-md-4 p-sm-3 p-md-4 m-md-0 my-1">
				<div class="card rounded border-0" onclick="window.location.href='{{route('newsarticles.show', $newsArticle->slug)}}'" style="cursor: pointer;">
					<img src="{{url('storage/img/newsarticles/'.json_decode($newsArticle->images, true)[0])}}" class="bg-primary rounded" style="height: 300px; width: auto;">
					<div class="card-body">
						<div class="row d-flex justify-content-between">
							<div class="col-auto">
								<h5>
									{{$newsArticle->title}}
								</h5>
							</div>
							<div class="col-auto">
								<h5 class="text-primary">
									Meer lezen <i class="fa fa-arrow-right"></i>
								</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
<div class="container-fluid py-md-5 py-3 my-4 bg-primary">
	<div class="text-center">
		<h2 class="h1">{{text()['title']['who-are-we-text']}}</h2>
		<hr>
		<div class="container">
			<p class="h5 font-weight-light my-4">
				{{text()['text']['who-are-we-text']}}
			</p>
		</div>
		<a href="{{route('aboutus.index')}}" class="btn btn-light my-1">Lees meer over ons</a>
	</div>
</div>
<div class="container-fluid px-md-5 py-md-5">
	<h2 class="h1 text-center">Onze activiteiten</h2>
	<hr>
	<div class="container">
		<div class="row">
			@foreach($calenderItems as $calenderItem)
				<div class="col-md-3 col-12 my-3">
					<div class="card" style="min-height: 200px;">
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
							<i class="fa fa-clock"></i> {{ date('d-m-Y H:i', strtotime($calenderItem->start_at)) }}
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
	<hr>
</div>
<div class="container py-md-5 py-3 my-4">
	<div class="row justify-content-between">
		<div class="col-md-5 col-12 align-self-center my-4">
			<h2 class="h1">{{text()['title']['picture-gallery-text']}}</h2>
			<p class="h5 font-weight-light">
				{{text()['text']['picture-gallery-text']}}
			</p>
			<a href="{{route('photogallery.index')}}" class="btn btn-secondary my-1">Bekijk meer foto's</a>
		</div>
		@if($images)
			<div class="col-md-6 col-12">
				<img loading="lazy" src="{{url('/storage/img/photogallery/'.$images[1]['image'].'')}}" class="img-fluid rounded shadow-lg mt-2" width="685px" height="527px">
			</div>
			<div class="col-md-6 col-12 mt-2">
				<img loading="lazy" src="{{url('/storage/img/photogallery/'.$images[2]['image'].'')}}" class="img-fluid rounded shadow-lg" width="685px" height="527px">
			</div>
		@endif
		<div class="col-md-5 col-12 align-self-center my-4">
			<h2 class="h1">{{text()['title']['any-questions-text']}}</h2>
			<p class="h5 font-weight-light">
				{{text()['text']['any-questions-text']}}
			</p>
			<a href="{{route('contact.index')}}" class="btn btn-primary my-1">Contact opnemen</a>
		</div>
	</div>
</div>

@if($pinnedArticle)
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      var title = "{{$pinnedArticle->title}}";
      var image = "{{url('/storage/img/newsarticles/'.json_decode($pinnedArticle->images, true)[0].'')}}";

      Swal.fire({
        title: "<b><h2>"+title+"</h2></b>", 
        html: "<img class='rounded w-100' src='"+image+"' style='height: 250px;''> <br> <a href='{{route('newsarticles.show', $pinnedArticle->slug)}}' class='btn btn-link text-primary m-1'>Meer lezen <i class='fa fa-arrow-right'></i></a>",  
        showCancelButton: false, 
        showConfirmButton: false,
      });
  </script>
@endif
@if($images)
  <script>
    const images = [
      @foreach($images as $image)
        "{{url('/storage/img/photogallery/'.$image['image'].'')}}",
      @endforeach
    ];

    slide()
    setInterval(slide, 5000);

    function slide() {
      var rand = Math.floor(Math.random() * images.length);
      var element = document.getElementById('carousel');
      element.style = "background-image: url('"+images[rand]+"');";
    }
  </script>
@endif
@endsection
