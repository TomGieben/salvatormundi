@extends('layouts.layout')
@section('content')
<div class="container my-5">
    <div class="title my-4">
        <div class="row d-flex justify-content-between">
            <div class="col-auto">
                <h1>{{$newsarticle->title}}</h1>
            </div>
            <div class="col-auto">
                @if(auth()->user())
                    <a href="{{route('admin.newsarticles.edit', $newsarticle->slug)}}" class="btn btn-warning" data-toggle="tooltip" title="Bewerken">
                        <i class="fa fa-pencil"></i>
                        Bewerken
                    </a>
                @else
                    <p class="m-1">Geschreven door: {{$newsarticle->writer}} | {{$newsarticle->created_at}}</p>
                @endif
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="container">
    <div id="tripCarousel" class="carousel slide shadow-lg my-4" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach (json_decode($newsarticle->images) as $key=>$image)
                @if($loop->first)
                    <li data-target="#tripCarousel" data-slide-to="{{$key}}" class="active"></li>
                @else    
                    <li data-target="#tripCarousel" data-slide-to="{{$key}}"></li>
                @endif
            @endforeach
        </ol>
        
        <div class="carousel-inner">
            @foreach (json_decode($newsarticle->images) as $image)
                @if($loop->first)
                    <div class="carousel-item active">
                        <img class="d-block w-100 rounded" src="{{url('storage/img/newsarticles/'.$image)}}">
                    </div>
                @else    
                    <div class="carousel-item">
                        <img class="d-block w-100 rounded" src="{{url('storage/img/newsarticles/'.$image)}}">
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="my-4" style="font-size: 2.5vh;">
        {!! $newsarticle->description !!}
    </div>   
    @if($realatedArticles)
        <h2 class="text-center">
            Gerelateerde artikelen
        </h2>
        <hr>
        <div class="row">
            @foreach ($realatedArticles as $realatedArticle)
                <div class="col-sm-6 col-md-4 p-sm-3 p-md-4 m-md-0 my-1">
                    <div class="card rounded border-0" onclick="window.location.href='{{route('newsarticles.show', $realatedArticle->slug)}}'" style="cursor: pointer;">
                        <img src="{{url('storage/img/newsarticles/'.json_decode($realatedArticle->images, true)[0])}}" class="bg-primary rounded" style="height: 300px; width: auto;">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between">
                                <div class="col-auto">
                                    <h5>
                                        {{$realatedArticle->title}}
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
    @endif
</div>
@endsection