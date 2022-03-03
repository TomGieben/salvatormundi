@extends('admin.layouts.layout')
@section('content')
<div class="container text-dark mt-5">
    <div>
        <h1 class="my-4">Nieuwsbrieven</h1>
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
    <form action="{{route('admin.newsletters.store')}}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
        <label for="title" class="form-label my-1">Titel:</label>
        <input name="title" type="text" class="form-control my-1" id="slug" placeholder="Titel" required>
        <input name="file" type="file" class="form-control my-1" id="file" placeholder="Bestand">
        <button type="submit" class="btn btn-success my-1"><i class="fa fa-plus"></i> Toevoegen</button>
    </form>
    <div class="row my-4">
        @foreach($newsletters as $newsletter)
            <div class="col-md-4 my-2">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{$newsletter->title}}</h2>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <div class="btn-group">
                                    <a href="{{route('newsletters.index')}}?slug={{$newsletter->slug}}" class="btn btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @if(auth()->user()->admin == 1)
                                        <a href="{{route('admin.newsletter.delete', $newsletter->slug)}}" class="btn btn-danger">
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