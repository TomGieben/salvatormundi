@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row my-4">
            @if(!$newsletters->count() == 0)
                @foreach($newsletters as $newsletter)
                    <div class="col-md-3 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{$newsletter->title}}</h2>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <div class="btn-group">
                                            <a href="{{route('newsletter.download', $newsletter->file)}}" class="btn btn-success">
                                                <i class="fa fa-download"> Download</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert text-center">Er zijn een niewsbrieven gevonden.</div>
            @endif
        </div>
    </div>
@endsection