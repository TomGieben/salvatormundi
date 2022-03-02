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
<div class="container-fluid bg-primary" style="height: 100vh;">
  {{-- Hier kun jij aan de slag --}}
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
<script>
  const images = [
    "{{url('/storage/img/photogallery/'.$images[0]['image'].'')}}",
    "{{url('/storage/img/photogallery/'.$images[1]['image'].'')}}",
    "{{url('/storage/img/photogallery/'.$images[2]['image'].'')}}",
    "{{url('/storage/img/photogallery/'.$images[3]['image'].'')}}",
    "{{url('/storage/img/photogallery/'.$images[4]['image'].'')}}",
  ];

  slide()
  setInterval(slide, 5000);

  function slide() {
    var rand = Math.floor(Math.random() * 4);
    var element = document.getElementById('carousel');
    element.style = "background-image: url('"+images[rand]+"');";
  }
</script>
@endsection
