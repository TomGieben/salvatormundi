@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="title my-4">
            <h1>Over ons</h1>
            <hr>
        </div>
    </div>
    <div class="container-fluid py-md-5 py-3 my-4 bg-primary">
        <div class="text-center">
            <h2 class="h1">Bestuur</h2>
            <hr>
            <img loading="lazy" src="{{url('/storage/img/photogallery/'.$images[0]['image'].'')}}" class="img-fluid rounded shadow-lg mt-2" alt="Wandel met ons" width="400px">
            <div class="container w-50">
                <div class="row">
                    <div class="col-md-6 pr-0">
                        <ul class="list-group list-group-flush text-left bg-primary">
                            <li class="list-group-item-primary">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                    </div>
                    <div class="col-md-6 pl-0">
                        <ul class="list-group list-group-flush text-left bg-primary">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                          </ul>
                    </div>
                </div>
            </div>
            <a href="" class="btn btn-light my-1">Contact</a>
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
                <img loading="lazy" src="{{url('/storage/img/photogallery/'.$images[1]['image'].'')}}" class="img-fluid rounded shadow-lg mt-2" alt="Wandel met ons" width="400px">
            </div>
            <div class="col-md-6 col-12 mt-2">
                <img loading="lazy" src="{{url('/storage/img/photogallery/'.$images[2]['image'].'')}}" class="img-fluid rounded shadow-lg mt-2" alt="Wandel met ons" width="400px">
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
    <div class="container">
        <div class="title">
            <div class="h4">Gilde Lied</div>
            <a href="{{route('newsletters.index')}}">Klik niet hier</a>
            <hr>
        </div>
    </div>    
@endsection