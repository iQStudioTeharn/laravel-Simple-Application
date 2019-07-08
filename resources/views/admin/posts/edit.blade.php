
@extends('layouts.admin')


@section('content')
    <h1>Edit Post</h1>
    @include('includes.form-errors')
    
    {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true,'class'=>"uk-grid-small ",'uk-grid']) !!}
   
    
    

    <div class="uk-width-1-1">
        {!! Form::select('category_id', array(''=>'Category') + $cat , null, ['class'=>'uk-select']) !!}
    </div>
    <div class="uk-width-1-1">
        {!! Form::text('title', null, ['placeholder'=>'post title','class'=>'uk-input']) !!}
    </div>
    <div class="uk-width-1-1">
        {!! Form::textarea('body', null, ['placeholder'=>'Content','class'=>'uk-textarea','resize'=>'none']) !!}
    </div>
    <div class="uk-width-1-1">
        
        {!! Form::checkbox('status', 1, null, ['id'=>'status','class'=>'uk-checkbox uk-text-middle']) !!}
        {!! Form::label('status', 'Publish', ['class'=>'uk-form-label uk-text-meta uk-text-middle']) !!}
    </div>
    <div class="uk-width-1-1">
            <img src="/images/{{ $post->photo ? $post->photo->profileImage : 'profile.jpeg' }}" alt="UserProfile" width="70" height="70"  class="uk-border-rounded">
        <div class="js-upload" uk-form-custom>
            {!! Form::file('profileImage') !!}
            <button class="uk-button uk-button-default" type="button" tabindex="-1">Feature Image</button>
        </div>    
    </div>
    <div class="uk-width-1-1">
        {!! Form::submit('ADD POST', ['class'=>'uk-button uk-button-default']) !!}
    </div>

    {!! Form::close() !!}
    
@stop
@section('footer')
    @include('includes.tinyeditor')
@stop