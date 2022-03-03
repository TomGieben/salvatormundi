@extends('layouts.layout')
@section('content')
<div class="container my-5">
    <div class="title my-4">
        <h1>Fotogalerij</h1>
        <hr>
    </div>
</div>
<div class="container my-4" style="min-height: 100vh;">
    <div class="row my-4">
        @foreach($categories as $category)
            <div class="col-auto p-1">
                <button type="button" onclick="show({{$category->id}})" class="btn btn-lg btn-secondary border-0 text-secondary w-100 h-100 rounded" style="background-color: #F8D7DA">{{$category->title}}</button>
            </div>
        @endforeach
    </div>
    <hr class="my-5">
    <div class="container-fluid">
        @foreach ($categories as $category)
        <div id="tab-{{$category->id}}" style="display: none;" class="row">
            <div class="row">
                <div class="col-12 my-3">
                    <h2 class="h1">{{ $category->title}}</h2>
                    <p>
                        {{$category->description}}
                    </p>
                </div>
                @if($category->images)
                    @foreach ($category->images as $image)
                        <div class="col-md-6 p-3">
                            <img class="rounded w-100" src="{{url('storage/img/photogallery/'.$image->image)}}" style="height: 250px;">
                        </div>
                    @endforeach
                @endif
            </div>  
        </div>
    @endforeach
    </div>
</div>
<script>
function show(id) {
    @foreach ($categories as $categorie)
        document.getElementById("tab-{{$categorie->id}}").style.display = "none";
    @endforeach

    document.getElementById("tab-"+id+"").style.display = "block";
}
</script>
@endsection