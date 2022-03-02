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
				<div class="card rounded border-0" onclick="window.location.href='" style="cursor: pointer;">
					<img src="{{url('storage/img/newsarticles/'.json_decode($newsArticle->images, true)[0])}}" class="bg-primary rounded" style="height: 400px; width: auto;">
					<div class="card-body">
						<div class="row d-flex justify-content-between">
							<div class="col-auto">
								<h5>
									{{$newsArticle->title}}
								</h5>
							</div>
							<div class="col-auto">
								<h5>
									<a href="">
										Meer lezen <i class="fa fa-arrow-right"></i>
									</a>
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
		<h2 class="h1">Wie zijn wij?</h2>
		<hr>
		<div class="container">
			<p class="h5 font-weight-light my-4">
				Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo iusto, ad, nemo minima laboriosam excepturi vero velit repellat dolore alias animi a! Aperiam vel quam eum facere. Consequatur voluptas sapiente, debitis aliquam delectus sed? Recusandae, suscipit voluptatem distinctio vel, illo autem quo mollitia vitae quia consectetur ea error neque incidunt nulla, eius deserunt dolorum explicabo illum quidem? Obcaecati minus molestias accusamus libero corrupti? Deleniti, natus repellat! Consectetur voluptate laboriosam harum deserunt ab et iusto voluptatem, eveniet error fugiat voluptas qui ex doloribus est perspiciatis, doloremque fuga ducimus? Sequi deserunt fugiat hic? Eaque ullam est rerum. Commodi est vero numquam excepturi debitis eum, repellendus consequatur sunt voluptatem rem quidem ea, modi vel error perferendis! Dolores est aspernatur laboriosam iste sunt magni, soluta, omnis rerum commodi distinctio repellat vel enim eligendi blanditiis debitis autem similique optio asperiores ad nesciunt iure provident unde repellendus. Aliquam recusandae ratione numquam quos nulla, perspiciatis ut assumenda.
			</p>
		</div>
		<a href="" class="btn btn-light my-1">Lees meer over ons</a>
	</div>
</div>
<div class="container py-md-5 py-3 my-4">
	<div class="row justify-content-between">
		<div class="col-md-5 col-12 align-self-center">
			<h2 class="h1">Fotogalerij</h2>
			<p class="h5 font-weight-light">
				Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam officia, magni ducimus quae iste, quod accusantium omnis sapiente possimus placeat, unde modi dicta beatae aspernatur? Tempore tenetur facere cumque facilis culpa, a iusto amet error suscipit ex vel explicabo eaque totam perspiciatis ducimus veritatis nihil animi possimus fugit cum? Dolor maxime tempore possimus aut ex rerum aliquid obcaecati commodi distinctio.
			</p>
			<a href="" class="btn btn-secondary my-1">Bekijk meer foto's</a>
		</div>
		<div class="col-md-6 col-12">
			<img loading="lazy" src="" class="img-fluid rounded shadow-lg mt-2" alt="Wandel met ons" width="685px" height="527px">
		</div>
		<div class="col-md-6 col-12 mt-2">
			<img loading="lazy" src="" class="img-fluid rounded shadow-lg" alt="Wandel met ons" width="685px" height="527px">
		</div>
		<div class="col-md-5 col-12 mt-2 align-self-center">
			<h2 class="h1">Heeft u vragen?</h2>
			<p class="h5 font-weight-light">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum quibusdam iste modi expedita non nihil reiciendis, assumenda saepe. Facere harum aut dignissimos, adipisci, quaerat illum voluptatum deleniti assumenda beatae sint esse iure velit pariatur. Consequuntur debitis laborum corporis architecto sunt officia nihil voluptatem, autem veritatis. Libero facere velit dicta voluptatem illum sint exercitationem consequuntur repudiandae explicabo est! Velit quis blanditiis optio est. Nostrum doloribus dolore recusandae a dolorum impedit ut adipisci provident. Nihil quod natus fuga praesentium quaerat sapiente in!
			</p>
			<a href="" class="btn btn-primary my-1">Contact opnemen</a>
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
        html: "<img class='rounded w-100' src='"+image+"' style='height: 250px;''> <br> <p class='mt-2'>Dit is de tekst die hij zelf kan aanpassen</p> <br> <a href='' class='btn btn-link text-primary m-1'>Meer lezen <i class='fa fa-arrow-right'></i></a>",  
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
