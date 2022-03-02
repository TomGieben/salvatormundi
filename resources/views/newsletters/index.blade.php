@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="title my-4">
            <h1>Nieuwsbrieven</h1>
            <hr>
        </div>
    </div>
    <div class="container">
        <div class="row my-4">
            @if(!$newsletters->count() == 0)
                @foreach($newsletters as $newsletter)
                    @if ($newsletter->slug !== "gilde-lied")
                        <div class="col-md-4 my-2">
                            <div class="card @if($requestSlug == $newsletter->slug) border border-danger @endif">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3>{{$newsletter->title}}</h3>
                                    </div>
                                    <h6 class="my-0">
                                        Geplaatst op: {{$newsletter->created_at->format('d-m-Y')}}
                                    </h6>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-between">
                                        <div class="btn-group col-12">
                                            <a href="{{route('newsletter.download', $newsletter->file)}}" class="btn btn-success">
                                                <i class="fa fa-download"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="container">
                            <div class="title my-4">
                                <hr>
                            </div>
                            <div class="card @if($requestSlug == $newsletter->slug) border border-danger @endif">
                                <div class="card-header">
                                    <div class="card-title text-center">
                                        <h3 class="mb-0">Gilde Lied</h3>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-between">
                                        <div class="btn-group col-12">
                                            <a href="{{route('newsletter.download', $newsletter->file)}}" class="btn btn-success">
                                                <i class="fa fa-download"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="alert text-center">Er zijn geen Niewsbrieven gevonden.</div>
            @endif
        </div>
    </div>
    
@endsection