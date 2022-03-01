@extends('admin.layouts.layout')
@section('content')
<div class="container text-dark mt-5">
    <div>
        <h1 class="my-4">Fotogallerij</h1>
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
        @foreach ($categories as $categorie)
            <div class="col-md-2 col-sm-3 p-1">
                <button type="button" onclick="show({{$categorie->id}})" class="btn btn-info w-100 h-100">{{$categorie->title}}</button>
            </div>
        @endforeach

        <div class="col-md-2 col-sm-3 p-1">
            <button onclick="location.href='{{route('admin.categories.index')}}'" class="btn btn-success w-100 h-100">
                <i class="fa fa-plus"></i> Toevoegen
            </button>
        </div>
    </div>
    @foreach ($categories as $categorie)
        <div class="container-fluid m-0 p-0" id="tab-{{$categorie->id}}" style="display: none;">
            <div class="row">
                @if($categorie->images)
                    @foreach ($categorie->images as $image)
                        <div class="col-md-4 p-1">
                            <img class="rounded w-100" src="{{url('storage/img/photogallery/'.$image->image)}}" alt="{{$image->title}}" style="height: 250px;">
                        </div>
                    @endforeach
                @endif
                <div class="col-md-4 p-1">
                    <button onclick="location.href='{{route('admin.photogallery.create')}}'" class="btn btn-light w-100" style="height: 250px">
                        <i class="fa fa-plus"></i> Toevoegen
                    </button>
                </div>
            </div>  
        </div>
    @endforeach
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