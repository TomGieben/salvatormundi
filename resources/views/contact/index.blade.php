@extends('layouts.layout')
@section('content')
    <div class="container">
        <h1 class="text-center">Contact</h1>
        <hr>
    </div>
    <div class="container">
        @if ($message = Session::get('error'))
        <div class="alert-message alert alert-danger col-12 p-2">
            <p>{{ $message }}</p>
        </div>
        @endif
    
        @if ($message = Session::get('success'))
            <div class="alert-message alert alert-success col-12 p-2">
                <p>{{ $message }}</p>
            </div>
            <hr>
        @endif
        <div class="form">
            <form id="contact-form" name="contact-form" action="{{route('contact.sendmail')}}" method="POST">
                @csrf
                @method('POST')
               <div class="row">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="name" class="m-1">Jouw naam</label>
                            <input type="text" id="name" name="name" class="form-control" value="" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="email" class="m-1">Jouw email</label>
                            <input type="email" id="email" name="email" class="form-control" value="" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="subject" class="m-1">Onderwerp</label>
                            <input type="text" id="subject" name="subject" value="" class="form-control" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form">
                            <label for="message" class="m-1">Het bericht</label>
                            <textarea type="text" id="message" name="message" rows="7" class="form-control md-textarea" required=""></textarea>
                        </div>

                    </div>
                </div>
                <input type="text" name="check_spam" style="display: none">
                <div class="text-center text-md-left">
                    <button type="submit" class="btn btn-primary mt-2">Verzenden</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-between my-4">
            <div class="col-md-5 col-12 align-self-center my-4">
                <h2 class="h1">{{$newsarticle->title}}</h2>
                <p class="h5 font-weight-light">
                    @if(strlen($newsarticle->description) > 500)
                        {!! substr($newsarticle->description,0,strpos($newsarticle->description, ' ',800)) !!}
                    @else
                        {!! $newsarticle->description !!}
                    @endif
                    <a href="{{route('newsarticles.show', $newsarticle->slug)}}" class="btn btn-link text-primary p-1 m-0">
                        Meer lezen <i class="fa fa-arrow-right"></i>
                    </a>
                </p>
            </div>
            <div class="col-md-6 col-12">
                <img loading="lazy" src="{{url('/storage/img/newsarticles/'.json_decode($newsarticle->images, true)[0].'')}}" class="img-fluid rounded shadow-lg mt-2" width="685px" height="527px">
            </div>
        </div>
    </div>
@endsection