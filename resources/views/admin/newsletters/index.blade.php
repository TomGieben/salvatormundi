@extends('admin.layouts.layout')
@section('content')
<div class="container text-dark">
    <div>
        <h1 class="my-4">Nieuwsbrieven</h1>
    </div>
    <form action="{{route('admin.newsletters.store')}}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
    
        <label for="title" class="form-label my-1">Titel:</label>
        <input name="title" type="text" class="form-control my-1" id="slug" placeholder="Titel" required>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success my-1"><i class="fa fa-plus"></i> Toevoegen</button>
    </form>  
</div>
<script>
    $('#inputGroupFile01').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
</script>
@endsection