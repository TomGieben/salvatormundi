@extends('admin.layouts.layout')
@section('content')
<div class="container text-dark">
    <div>
        <h1 class="my-4">Nieuws artikelen</h1>
    </div>

    @if ($message = Session::get('error'))
        <div class="alert-message alert alert-danger col-12 p-2">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{route('admin.newsarticles.store')}}" method="post">
        @method('post')
        @csrf
    
        <label for="title" class="form-label my-1">Titel:</label>
        <input name="title" type="text" class="form-control my-1" id="slug" placeholder="Titel" required>
        <button type="submit" class="btn btn-success my-1"><i class="fa fa-plus"></i> Toevoegen</button>
    </form>  
</div>
@endsection