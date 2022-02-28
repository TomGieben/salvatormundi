@extends('admin.layouts.layout')
@section('content')
<div class="container text-dark">
    <div>
        <h1 class="my-4">Nieuwsbrieven</h1>
    </div>
    <form action="{{route('admin.newsletters.store')}}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
    
        <label for="title" class="form-label my-1">Titel:</label>
        <input name="title" type="text" class="form-control my-1" id="slug" placeholder="Titel" required>
        <input name="file" type="file" class="form-control my-1" id="file" placeholder="Bestand">
        <button type="submit" class="btn btn-success my-1"><i class="fa fa-plus"></i> Toevoegen</button>
    </form>  
</div>
@endsection