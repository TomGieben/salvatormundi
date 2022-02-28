@extends('admin.layouts.layout')
@section('content')
<div class="container text-dark mt-5">
    <div>
        <h1 class="my-4">Activiteiten</h1>
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

    <ul class="list-group">
        @if($items)
            @foreach ($items as $item)
                <li class="list-group-item">{{$items->title}}</li>
            @endforeach
        @endif

        <li class="list-group-item">
            <button onclick="showPopup()" class="btn btn-success w-100">
                <i class="fa fa-plus"></i> Toevoegen
            </button>
        </li>
    </ul>

    <form action="{{route('admin.calendaritems.store')}}" method="post">
        @method('post')
        @csrf
    
        <div class="card m-4" id="add">
            <div class="card-header">
                <div class="card-title">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <h2>Activiteit toevoegen</h2>
                        </div>
                        <div class="col-auto">
                            <button onclick="closePopup()" class="btn btn-danger">
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
        
                <label for="start-date" class="form-label my-1">Datum:</label>
                <input name="start-date" type="datetime-local" class="form-control my-1" id="start-date" required>
        
                <label for="newsarticle">Kies eventueel een nieuws artikel:</label>
                <select name="newsarticle" id="newsarticle" class="form-control">
                    <option disabled selected>-nieuws artikel-</option>
                    @foreach($newsarticles as $newsarticle)
                        <option value="{{$newsarticle->id}}">{{$newsarticle->title}}</option>
                    @endforeach
                </select>
        
                <button type="submit" class="btn btn-success my-1"><i class="fa fa-save"></i> Opslaan</button>
            </div>
        </div>
    </form> 
</div>
<script>
    function showPopup() {
        document.getElementById("add").style.display = "block";
    }

    function closePopup() {
        document.getElementById("add").style.display = "none";
    }
</script>
@endsection