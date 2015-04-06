@extends('creativity')

@section('content')

{!! Form::open(['url'=>'paintings','method'=>'POST', 'files'=>true, 'enctype'=>'multipart/form-data']) !!}
  
  <div class="form-group">
    {!! Form::label('painting', 'Upload Artwork:') !!}
    {!! Form::file('painting', null, ['class' => 'form-control']) !!}
  </div>

  @include('paintings.form', ['submitButtonText' => 'Add'])

{!! Form::close() !!}

@include('errors.list')

@endsection