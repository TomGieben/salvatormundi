@extends('layouts.layout')
@section('content')
    <div class="container my-5">
        <div class="title my-4">
            <h1 class="text-center">Over ons</h1>
            <hr>
        </div>
    </div>
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <img loading="lazy" src="{{url('/storage/img/photogallery/'.$images[1]['image'].'')}}" class="img-fluid rounded shadow-lg mt-2" width="685px" height="527px">
            </div>
            <div class="col-md-5 col-12 align-self-center">
                <h2 class="h1">{{text()['title']['history-text']}}</h2>
                <p class="h5 font-weight-light">
                    {{text()['text']['history-text']}}
                </p>
            </div>
            <div class="col-md-5 col-12 mt-2 align-self-center">
                <h2 class="h1">{{text()['title']['clothing-text']}}</h2>
                <p class="h5 font-weight-light">
                    {{text()['text']['clothing-text']}}
                </p>
            </div>
            <div class="col-md-6 col-12 mt-2">
                <img loading="lazy" src="{{url('/storage/img/photogallery/'.$images[2]['image'].'')}}" class="img-fluid rounded shadow-lg mt-2" width="685px" height="527px">
            </div>
        </div>
    </div>
    <div class="container-fluid py-md-5 py-3 my-4 bg-primary">
        <div class="text-center">
            <h2 class="h1">{{text()['title']['management-text']}}</h2>
            <hr>
            <img loading="lazy" src="{{url('/storage/img/photogallery/'.$images[0]['image'].'')}}" class="img-fluid rounded shadow-lg mt-2 mb-3" width="685px" height="527px">
            <div class="container w-50">
                {{text()['text']['management-text']}}
            </div>
            <a href="" class="btn btn-light mt-3">Contact</a>
        </div>
    </div>
    <div class="container py-md-5 py-3 my-4">
        <div class="row justify-content-center">
            <div class="col-md-5 col-12 align-self-center">
                <h2 class="h1">{{text()['title']['flag-text']}}</h2>
                <p class="h5 font-weight-light">
                    {{text()['text']['flag-text']}}
                </p>
            </div>
            <div class="col-md-6 col-12">
                <img loading="lazy" src="{{url('/storage/img/photogallery/'.$images[3]['image'].'')}}" class="img-fluid rounded shadow-lg mt-2" width="685px" height="527px">
            </div>
            <div class="col-md-6 col-12 mt-2">
                <img loading="lazy" src="{{url('/storage/img/photogallery/'.$images[4]['image'].'')}}" class="img-fluid rounded shadow-lg mt-2" width="685px" height="527px">
            </div>
            <div class="col-md-5 col-12 mt-2 align-self-center">
                <h2 class="h1">{{text()['title']['any-questions-text']}}</h2>
                <p class="h5 font-weight-light">
                    {{text()['text']['any-questions-text']}}
                </p>
                <a href="" class="btn btn-primary my-1">Contact opnemen</a>
            </div>
        </div>
    </div>
    <div class="container-fluid py-md-5 py-3 mt-4 bg-primary">
        <div class="title text-center">
            <div class="h4">Gilde Lied</div>
            <a href="{{route('newsletters.index')}}" class="text-dark btn btn-light">Ga naar Gilde Lied</a>
            <hr>
        </div>
    </div>    
@endsection