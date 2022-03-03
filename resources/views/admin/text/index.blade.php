@extends('admin.layouts.layout')
@section('content')
    <div class="container text-dark mt-5">
        <div>
            <h1 class="my-4">Teksten</h1>
        </div>
        <hr>
    </div>
        {{--
             @if ($message = Session::get('error'))
            <div class="alert-message alert alert-danger col-12 p-2">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert-message alert alert-success col-12 p-2">
                <p>{{ $message }}</p>
            </div>
        @endif --}}
    <div class="container w-75">
        @foreach($texts as $text)
            <form action="{{route('admin.text.edit', $text->id)}}" method="post" enctype="multipart/form-data">
                @method('post')
                @csrf
                <h5 class="my-1">{{$text->name}}</h5>
                <div class="row">
                    <div class="col-10">
                        <div class="form-group row my-0">
                            <label for="name" class="col-sm-1 col-form-label my-1">Tietel</label>
                            <div class="col-sm-11">
                                <input name="name" type="text" class="form-control my-1" id="name" value="{{$text->name}}" required>
                            </div>
                        </div>
                        <div class="form-group row my-0">
                            <label for="name" class="col-sm-1 col-form-label my-1">Tekst</label>
                            <div class="col-sm-11">
                                <textarea name="text" id="text" class="w-100">{{$text->text}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-success w-100 h-100 py-0"><i class="fa fa-plus"></i> Opslaan</button>
                    </div>
                </div>
            </form>
            <hr>
        @endforeach
    </div>
@endsection