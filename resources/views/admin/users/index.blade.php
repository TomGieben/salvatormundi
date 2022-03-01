@extends('admin.layouts.layout')
@section('content')
<div class="container text-dark mt-5">
    <div>
        <h1 class="my-4">Gebruikers Paneel</h1>
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
        @if($users)
            @foreach ($users as $user)
                <li class="list-group-item">
                    Naam: <b>{{$user->name}}</b> |
                    Email: <b>{{$user->email}}</b> |
                    Status: 
                    @if($user->admin) <span class="text-danger">Administrator</span> @else <span class="text-info">Schrijver</span> @endif |
                    <div class="btn-group m-1 float-right">
                        <a href="{{route('admin.users.delete', $user->id)}}" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                        <button onclick="showEdit({{$user->id}})" class="btn btn-warning">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </div>
                </li>
                <li class="list-group-item bg-light" id="item-{{$user->id}}" style="display: none;">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <h2>Gebruiker Gegevens Wijzigen</h2>
                        </div>
                        <div class="col-auto">
                            <button onclick="closeEdit({{$user->id}})" class="btn btn-danger">
                                <i class="fa fa-times"></i> Anuleren
                            </button>
                        </div>
                    </div>
                    <form action="{{route('admin.users.update', $user->id)}}" method="post">
                        @method('post')
                        @csrf

                        <input name="name" type="text" class="form-control my-1" id="name" placeholder="Name" value="{{$user->name}}" required> 
                        <input name="email" type="text" class="form-control my-1" id="text" value="{{$user->email}}" required> 
                        <input name="password" type="text" class="form-control my-1" id="password" placeholder="wacht woord wijzigen">
                        <label for="admin" class="form-label my-1">Administrator:</label>
                        <input type="checkbox" id="admin" name="admin" @if($user->admin) checked @endif>
                        <span><i>*Als Administrator niet aan gevinkt is ben je automatisch een Schrijver</i></span>
                        <div class="my-1">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Opslaan
                            </button>
                    </form>    
                </li>
            @endforeach
        @endif
        <li class="list-group-item">
            <button onclick="showPopup()" class="btn btn-success w-100">
                Nieuwe Gebruiker
            </button>
        </li>
    </ul>

    <form action="{{route('admin.users.store')}}" method="post">
        @method('post')
        @csrf
    
        <div class="card m-4" id="add" style="display: none;">
            <div class="card-header">
                <div class="card-title">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <h2>Gebruiker Toevoegen</h2>
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
                <label for="name" class="form-label my-1">Naam:</label>
                <input name="name" type="text" class="form-control my-1" id="name" placeholder="Naam" required>
        
                <label for="email" class="form-label my-1">Email:</label>
                <input name="email" type="email" class="form-control my-1" id="email" placeholder="Email" required>
        
                <label for="password" class="form-label my-1">Wachtwoord:</label>
                <input type="text" name="password" class="form-control my-1" id="password" placeholder="Wachtwoord">
        
                <label for="admin" class="form-label my-1">Administrator:</label>
                <input type="checkbox" id="admin" name="admin">
                <span><i>*Als Administrator niet aan gevinkt is ben je automatisch een Schrijver</i></span>
                
                <button type="submit" class="btn btn-success form-control  my-1"><i class="fa fa-plus"></i> Gebruiker Toevoegen</button>
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