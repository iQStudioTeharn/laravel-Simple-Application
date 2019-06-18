
@extends('layouts.admin')


@section('content')
    <h1>Edit Profile</h1>
   
   @include('includes.form-errors')
   
    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true,'class'=>"uk-grid-small ",'uk-grid']) !!}

        <div class="uk-margin uk-width-1-1">
            <div class=" uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: user"></span>
                {!! Form::text('name', null, ['placeholder'=>'Name','class'=>'uk-input']) !!}
            </div>
        </div>

        <div class="uk-margin uk-width-1-1">
                <div class=" uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: mail"></span>
                    {!! Form::text('email', null, ['placeholder'=>'Email','class'=>'uk-input']) !!}
                </div>
            </div>

       

        <div class="uk-margin uk-width-1-1">
            <div class=" uk-inline uk-width-1-1">
                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                {!! Form::password('password', ['placeholder'=>'password','class'=>'uk-input','value'=>$user->password]) !!}
            </div>
        </div>
        
       
       @php
        $roleArray = [];
            foreach ($roles as $role) {
            $roleArray[$role->id] = $role->name;
            }    
        
       @endphp
       
        
        <div class="uk-margin uk-width-1-1">
            <div class="uk-width-1-1 ">
                {!! Form::label('role', 'Role', ['class'=>'uk-form-label uk-text-meta']) !!}
                {!! Form::select('role_id', $roleArray, null, ['id'=>'role','class'=>'uk-select']) !!}
            </div>
        </div>

        <div class="uk-margin uk-width-1-1">
            <div class="uk-width-1-1">
                
                {!! Form::label('status', 'Active', ['class'=>'uk-form-label uk-text-meta']) !!}
                
                {!! Form::checkbox('is_active', 1, null, ['id'=>'status','class'=>'uk-checkbox']) !!}
            </div>
        </div>

        <div class="uk-margin uk-width-1-1">
            <div class="uk-width-1-1">
                
                

                <img src="/images/{{ $user->photo ? $user->photo->profileImage : 'profile.jpeg' }}" alt="UserProfile" width="70" height="70"  class="uk-border-rounded">
                <div class="js-upload" uk-form-custom>
                    {!! Form::file('profileImage') !!}
                    <button class="uk-button uk-button-default" type="button" tabindex="-1">Upload Image</button>
                </div>
            </div>
        </div>
        
        <div class="uk-width-1-1">
            {!! Form::submit('Add User', ['class'=>'uk-button uk-button-primary']) !!}
        </div>


    {!! Form::close() !!}
        
    
    
    
@stop


