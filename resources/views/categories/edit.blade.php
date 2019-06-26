
@extends('layouts.admin')


@section('content')
<h1>edit category</h1>

@include('includes.form-errors')
   


{!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesConrtoller@update',$category->id],'class'=>"uk-grid-small ",'uk-grid']) !!}

    <div class="uk-margin uk-width-1-1">
        <div class=" uk-inline uk-width-1-1">
            <span class="uk-form-icon" uk-icon="icon: file-text"></span>
            {!! Form::text('name', null, ['placeholder'=>'Name','class'=>'uk-input']) !!}
        </div>
    </div>

    
    
    <div class="uk-width-1-1">
        {!! Form::submit('edit', ['class'=>'uk-button uk-button-primary']) !!}
    </div>


{!! Form::close() !!}
@stop
