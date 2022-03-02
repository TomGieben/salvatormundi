@extends('layouts.layout')
@section('content')
<div class="container my-5">
    <div class="title my-4">
        <h1>Nieuws</h1>
        <hr>
    </div>
</div>
<div class="container">
    <div class="row my-4">
        @if($newsArticles->count() !== 0)
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
        @else
            <div class="alert text-center">Er zijn geen artikelen gevonden.</div>
        @endif
    </div>
</div>
@endsection