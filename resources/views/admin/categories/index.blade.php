@extends('admin.layouts.layout')
@section('content')
<div class="container text-dark mt-5">
    <div class="row justify-content-between">
        <div class="col-auto">
            <h1 class="my-4">Categorieën</h1>
        </div>
        <div class="col-auto">
            <a href="{{route('admin.photogallery.index')}}" class="btn btn-light my-4">
                <i class="fa fa-arrow-left"></i> Terug
            </a>
        </div>
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

    <div class="my-4">
        <ul class="list-group" id="list">
            @foreach ($categories as $categorie)
                <li class="list-group-item">
                    Titel: <b>{{$categorie->title}}</b>
                    <div class="btn-group m-1 float-right">
                        <a href="{{route('admin.categories.delete', $categorie->slug)}}" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                        <button onclick="showEdit({{$categorie->id}})" class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </li>

                <li class="list-group-item bg-light" id="item-{{$categorie->id}}" style="display: none;">
                    <form action="{{route('admin.categories.update', $categorie->slug)}}" method="post">
                        @method('post')
                        @csrf

                        <input name="title" type="text" class="form-control my-1" id="title" placeholder="Titel" value="{{$categorie->title}}" required> 
                        <textarea name="description" type="text" class="form-control my-1" id="description">{{$categorie->description}}</textarea> 
                        <div class="btn-group my-1">
                            <button type="button" onclick="closeEdit({{$categorie->id}})" class="btn btn-danger">
                                <i class="fa fa-times"></i> Annuleren
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Opslaan
                            </button>
                        </div>
                    </form>    
                </li>
            @endforeach
            <li class="list-group-item">
                <button onclick="showCreate()" class="btn btn-success w-100">
                    <i class="fa fa-plus"></i> Toevoegen
                </button>
            </li>
        </ul>
    </div>

    <form action="{{route('admin.categories.store')}}" method="post">
        @method('post')
        @csrf
    
        <div class="card m-4" id="create" style="display: none;">
            <div class="card-header">
                <div class="card-title">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <h2>Categorie toevoegen</h2>
                        </div>
                        <div class="col-auto">
                            <button onclick="closeCreate()" class="btn btn-danger">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <label for="title" class="form-label my-1">Titel:</label>
                <input name="title" type="text" class="form-control my-1" id="title" placeholder="Titel" required>
        
                <label for="description" class="form-label my-1">Beschrijving:</label>
                <textarea name="description" type="text" class="form-control my-1" id="description"></textarea>
        
                <button type="submit" class="btn btn-success my-1"><i class="fa fa-save"></i> Opslaan</button>
            </div>
        </div>
    </form> 

</div>
<script>
    function showCreate() {
        document.getElementById("create").style.display = "block";
    }

    function closeCreate() {
        document.getElementById("create").style.display = "none";
    }

    function showEdit(id) {
        document.getElementById("item-"+id+"").style.display = "block";
    }

    function closeEdit(id) {
        document.getElementById("item-"+id+"").style.display = "none";
    }
</script>
@endsection