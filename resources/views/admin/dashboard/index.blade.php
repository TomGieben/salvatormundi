@extends('admin.layouts.layout')
@section('content')
    <div class="container">
        <div class="row col-auto m-0 px-0">
            <h1 class="my-4">Gilde Salvator Mundi | Dashboard</h1>
            <div class="text-right my-4 col px-0">
                <a href="{{route('welcome.index')}}" class="btn btn-success my-2">Website <i class="fa fa-eye"></i></a>
            </div>
        </div>
        <hr class="mt-0">
    </div>
    @if(auth()->user()->admin == 1)
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="h4">
                        <a href="{{route('admin.users.index')}}">Gebruikers</a>
                    </div>
                    <div class="h6">
                        Er zijn <u>{{$users->count()}}</u> Administratoren en schrijvers
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group" id="list">
                        @if($users)
                            @foreach ($users as $user)
                                <li class="list-group-item">
                                    Naam: <b>{{$user->name}}</b> |
                                    Email: <b>{{$user->email}}</b> |
                                    Status: 
                                    @if($user->admin) <span class="text-danger">Administrator</span> @else <span class="text-info">Schrijver</span> @endif |
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <hr>
        </div>
    @endif
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="h4">
                    Bezoekjes
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($visits as $key=>$visit)
                        <div class="card my-2 mx-auto">
                            <div class="card-header">
                                <h4 class="text-center">{{$key}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        Pagina
                                    </div>
                                    <div class="col text-right">
                                        Aantal keer bekeken
                                    </div>
                                </div>
                                @foreach($visit as $key=>$value)
                                    <div class="row">
                                        <div class="col">
                                            {{$key}}
                                        </div>
                                        <div class="col text-right">
                                            {{$value['views']}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="h4">
                            <a href="{{route('admin.photogallery.index')}}">Foto Gallerij</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                Totaal aantal foto's:
                            </div>
                            <div class="col text-right">
                                {{$imgCount}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Totaal aantal Categorieën: 
                            </div>
                            <div class="col text-right">
                                {{$imgCatCount}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="h4">
                            <a href="{{route('admin.newsletters.index')}}">Nieuws brieven</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                Niews brieven:
                            </div>
                            <div class="col text-right">
                                {{$newsLetterTotal}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="h4">
                            <a href="{{route('admin.newsarticles.index')}}">Nieuws artikelen</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                Aantal: 
                            </div>
                            <div class="col text-right">
                                {{$newsArticles}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="h4">
                            Account
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                Gebruikers naam: 
                            </div>
                            <div class="col text-right">
                                {{auth()->user()->name}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Email: 
                            </div>
                            <div class="col text-right">
                                {{auth()->user()->email}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Status: 
                            </div>
                            <div class="col text-right">
                                @if($user->admin) <span class="text-danger">Administrator</span> @else <span class="text-info">Schrijver</span> @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="height: 10vh;">

    </div>
@endsection