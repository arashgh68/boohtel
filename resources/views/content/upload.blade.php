@extends('layouts.app')

@section('content')
   
<div class="row">
    
    <div class="medium-6 large-5 columns">
     <form method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image_upload">
        <small class="error">{{ $errors->first('image_upload') }}</small>
        <input type="submit" value="upload" class="botton success hollow">
    </form>
    </div>
  </div>
@endsection