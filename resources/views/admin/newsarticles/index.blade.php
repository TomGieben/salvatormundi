@extends('admin.layouts.layout')
@section('content')
<div class="container text-dark mt-5">
    <div>
        <h1 class="my-4">Nieuws artikelen</h1>
    </div>

    @if ($message = Session::get('error'))
        <div class="alert-message alert alert-danger col-12 p-2">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert-message alert alert-success col-12 p-2">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.newsarticles.store')}}" method="post">
                @method('post')
                @csrf
            
                <label for="title" class="form-label my-1">Titel:</label>
                <input name="title" type="text" class="form-control my-1" id="title" placeholder="Titel" required>
                <button type="submit" class="btn btn-success my-1"><i class="fa fa-plus"></i> Toevoegen</button>
            </form>  
        </div>
    </div>
    <div class="row my-4">
        @foreach($newsarticles as $newsarticle)
            <div class="col-md-4 my-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="card-title col">
                                <h2>{{$newsarticle->title}}</h2>
                            </div>
                            @if($newsarticle->pin)
                                <div class="col-auto mt-1">
                                    <h4>
                                        <i class="fa fa-thumb-tack"></i>
                                    </h4>
                                </div> 
                            @endif
                        </div>
                    </div>
                    <div class="card-body p-2">
                        @if($newsarticle->images)
                            <img class="d-block rounded w-100" src="{{url('storage/img/newsarticles/'.json_decode($newsarticle->images, true)[0])}}" alt="{{$newsarticle->slug}}" style="height: 250px;">
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <i class="fa fa-user"></i> {{$newsarticle->writer}}
                            </div>
                            <div class="col-auto">
                                <div class="btn-group">
                                    <a href="{{route('newsarticles.show', $newsarticle->slug)}}" class="btn btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('admin.newsarticles.edit', $newsarticle->slug)}}" class="btn btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @if(auth()->user()->admin == 1)
                                        <a href="{{route('admin.newsarticles.delete', $newsarticle->slug)}}" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection