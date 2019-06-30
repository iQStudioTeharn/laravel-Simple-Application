
@extends('layouts.admin')


@section('content')
    
    <h1>Media</h1>

@if ($photos)
    
    <table class="table">
        <thead>
            <th>name</th>
            <th>created</th>
            <th>updated</th>
            <th>action</th>
        </thead>
        <tbody>
            
            @foreach ($photos as $photo)
                <tr>
                    <td class="uk-text-middle"><img src="/images/{{ $photo ? $photo->profileImage : 'profile.jpeg' }}" alt="UserProfile" width="70" height="70"  class="uk-border-rounded"></td>
                    <td class="uk-text-middle">{{ $photo->created_at->diffForHumans() }}</td>
                    <td class="uk-text-middle">{{ $photo->updated_at->diffForHumans() }}</td>
                    <td class="uk-text-middle">
                        <ul class="uk-iconnav">
                            <form method="POST" action="{{ route('admin.media.delete',['id'=>$photo->id]) }}">
                                {{ method_field("DELETE") }}
                                {{ csrf_field() }}
                                <li>
                                    
                                    {!! Form::label('Delete'.$photo->id, '', ['class'=>'uk-text-danger','uk-tooltip'=>"Delete",'uk-icon'=>'icon: trash']) !!}
                                    {!! Form::submit(null, ['id'=>'Delete'.$photo->id,'hidden'=>true]) !!}
                                    
                                </li>
                            
                            </form>
                        </ul>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

@endif
@stop

