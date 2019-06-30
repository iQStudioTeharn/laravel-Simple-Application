
@extends('layouts.admin')



@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">    

<h1>add Media</h1>

@include('includes.form-errors')
   


{!! Form::open(['method'=>'POST','action'=>'AdminMediaController@save','class'=>"uk-grid-small dropzone",'uk-grid']) !!}

   

{!! Form::close() !!}

@stop


@section('footer')


<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>    
@stop

