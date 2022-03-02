@extends('layouts.layout')
@section('content')
<div class="container my-5">
    <div class="title my-4">
        <h1>Nieuws</h1>
        <hr>
    </div>
</div>
<div class="container">
    <div class="row my-4">
        {{-- @if($newsArticles->count() !== 0)
           @foreach($newsArticles as $newsArticle)
            
           @endforeach
        @else
            <div class="alert text-center">Er zijn geen artikelen gevonden.</div>
        @endif --}}
    </div>
</div>
@endsection