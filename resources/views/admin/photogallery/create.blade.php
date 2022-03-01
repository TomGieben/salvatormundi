@extends('admin.layouts.layout')
@section('content')
<div class="container text-dark mt-5">
    <div>
        <h1 class="my-4">Foto toevoegen</h1>
    </div>

    @if ($message = Session::get('error'))
        <div class="alert-message alert alert-danger col-12 p-2">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{route('admin.photogallery.store')}}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf

        <div class="w-100 my-1">
            <label for="images" class="form-label my-1">Afbeeldingen:</label>
            <input name="images[]" type="file" class="form-control" id="images" placeholder="Afbeelding" accept="image/*" multiple required>
        </div>
        <div class="w-100 my-1">
            <label for="category">Kies een categorie:</label>
            <select name="category" id="category" class="form-control" required>
                <option disabled selected>-categorie-</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success my-1">
            <i class="fa fa-save"></i> Opslaan
        </button>
    </form>
</div>