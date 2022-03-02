@extends('layouts.layout')
@section('content')
    <div class="container">
        <h1 class="text-center">Contact</h1>
        <hr>
    </div>
    <div class="container">
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
                            <input type="text" id="email" name="email" class="form-control" value="" required="">
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
    <div class="container-fluid py-md-5 py-3 mt-4 bg-primary">
        wejow
    </div>
@endsection