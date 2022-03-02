@extends('admin.layouts.layout')
@section('content')
<div class="container text-dark mt-5">
    <div>
        <h1 class="my-4">{{$newsarticle->title}} | Bewerken</h1>
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

    <form action="{{route('admin.newsarticles.update', $newsarticle->slug)}}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="row">
            <div class="col-md-4  my-1">
                <label for="title" class="form-label my-1">Titel:</label>
                <input name="title" type="text" class="form-control my-1" id="title" placeholder="Titel" value="{{$newsarticle->title}}" required>
            </div>
            <div class="col-md-4  my-1">
                <label for="writer" class="form-label my-1">Schrijver:</label>
                <input name="writer" type="text" class="form-control my-1" id="writer" placeholder="Schrijver" value="{{auth()->user()->name}}" required>
            </div>
            <div class="col-md-4  my-1">
                <label for="images" class="form-label my-1">Afbeeldingen: @if($newsarticle->images) | Momenteel {{count(json_decode($newsarticle->images, true))}} afbeeldingen @endif</label>
                <input name="images[]" type="file" class="form-control" id="images" placeholder="Afbeelding" accept="image/*" multiple>
            </div>
            <div class="col-12 my-1">
                <label for="description my-1" class="form-label">Tekst:</label>
                <textarea class="tinymce form-control" name="description" id="description">@if(old()) {{old('description')}} @else {{$newsarticle->description}} @endif</textarea>
            </div>
            <div class="col-12 my-1">
                <label for="pin" class="my-1">Pin: </label>
                <input class="my-1" name="pin" id="pin" type="checkbox" @if($newsarticle->pin) checked @else @endif>
                <i>*Laat een popup zien met link naar het article.</i>
            </div>
        </div>
        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Toevoegen
        </button>
    </form>
</div>
@endsection