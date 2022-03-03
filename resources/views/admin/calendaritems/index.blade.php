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

    <ul class="list-group" id="list">
        @if($items)
            @foreach ($items as $item)
                <li class="list-group-item">
                    Titel: <b>{{$item->title}}</b> |
                    Datum/Tijd: <b>{{ date('d-m-Y H:i', strtotime($item->start_at)) }}</b> |
                    @if($item->newsarticle)
                        Gekoppeld: <a href="" class="text-dark"><b>{{$item->newsarticle->title}}</b></a> |
                    @endif
                    Beschrijving: @if($item->description) <i class="fa fa-check text-success"></i> @else <i class="fa fa-times text-danger"></i> @endif |
                    <div class="btn-group m-1 float-right">
                        <a href="{{route('admin.calendaritems.delete', $item->slug)}}" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                        <button onclick="showEdit({{$item->id}})" class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </li>

                <li class="list-group-item bg-light" id="item-{{$item->id}}" style="display: none;">
                    <form action="{{route('admin.calendaritems.update', $item->slug)}}" method="post">
                        @method('post')
                        @csrf

                        <input name="title" type="text" class="form-control my-1" id="title" placeholder="Titel" value="{{$item->title}}" required> 
                        <input name="startdate" type="datetime-local" class="form-control my-1" id="start-date" value="{{ date('Y-m-d\TH:i:s', strtotime($item->start_at)) }}" required> 
                        <textarea name="description" type="text" class="form-control my-1" id="description">{{$item->description}}</textarea> 
                        <select name="newsarticle" id="newsarticle" class="form-control"> 
                            <option disabled selected>-nieuws artikel-</option>
                            @foreach($newsarticles as $newsarticle)
                                <option value="{{$newsarticle->id}}" @if($newsarticle->id == $item->news_article_id) selected @endif>{{$newsarticle->title}}</option>
                            @endforeach
                        </select> 
                        <div class="btn-group my-1">
                            <button type="button" onclick="closeEdit({{$item->id}})" class="btn btn-danger">
                                <i class="fa fa-times"></i> Annuleren
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Opslaan
                            </button>
                        </div>
                    </form>    
                </li>
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
    
        <div class="card m-4" id="add" style="display: none;">
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
                <input name="startdate" type="datetime-local" class="form-control my-1" id="start-date" required>
        
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

    function showEdit(id) {
        document.getElementById("item-"+id+"").style.display = "block";
    }

    function closeEdit(id) {
        document.getElementById("item-"+id+"").style.display = "none";
    }
</script>
@endsection