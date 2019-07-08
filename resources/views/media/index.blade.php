
@extends('layouts.admin')


@section('content')
@include('includes.form-errors')
    <h1>Media</h1>

@if ($photos)
    <form id="bulkDelete" action="/admin/media/bulkdelete" method="POST"> @csrf </form>
    <table class="table">
        <thead>
            <th>name</th>
            <th>created</th>
            <th>updated</th>
            <th>action</th>
            <th><input type="checkbox" id="selectAll" class="uk-text-middle uk-checkbox"> All</th>
            <th><input type="submit" value="Delete Selected" form="bulkDelete" class="uk-button uk-button-danger"></th>
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
                    <td class="uk-text-middle">{!! Form::checkbox('bulkDelete[]', $photo->id ,null,['form'=>'bulkDelete','class'=>'uk-checkbox checkboxes']) !!}</td>
                    <td></td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

@endif
@stop


@section('footer')
    <script>
        $('#selectAll').on('click',function(){
            if($(this).prop("checked") == true){

                $('.checkboxes').prop( "checked", true )
            }
            else {
                $('.checkboxes').prop( "checked", false )
            }
        })
    </script>
@stop
