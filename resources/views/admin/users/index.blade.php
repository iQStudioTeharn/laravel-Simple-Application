@extends('layouts.admin')


@section('content')
    
    <h1>Users</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Role</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($users)
                
                @foreach ($users as $user)

                <tr>
                    
                    <td class="uk-text-middle">
                        <img src="/images/{{ $user->photo ? $user->photo->profileImage : 'profile.jpeg' }}" alt="UserProfile" width="70" height="70"  class="uk-border-rounded">
                        {{ $user->name }}
                    </td>
                    <td class="uk-text-middle">{{ $user->email }}</td>
                    <td class="uk-text-middle">{{ $user->role->name }}</td>
                    <td class="uk-text-middle">{{ $user->created_at->diffForHumans() }}</td>
                    <td class="uk-text-middle">{{ $user->updated_at->diffForHumans() }}</td>
                    <td class="uk-text-middle">
                        @if ($user->is_active == 1)
                            {{ 'Active' }}
                        @else
                            {{ 'Deactive' }}
                        @endif
                        
                    </td>
                    <td class="uk-text-middle">
                        <ul class="uk-iconnav">
                            <li><a href="{{ route('users.edit',$user->id) }}" uk-icon="icon: file-edit" uk-tooltip="Edit"></a></li>
                            {!! Form::open(['method'=>'DELETE' , 'action'=>['AdminUsersController@destroy',$user->id]]) !!}
                                
                                <li>
                                    
                                    {!! Form::label('Delete'.$user->id, '', ['class'=>'uk-text-danger','uk-tooltip'=>"Delete",'uk-icon'=>'icon: trash']) !!}
                                    {!! Form::submit(null, ['id'=>'Delete'.$user->id,'hidden'=>true]) !!}
                                    
                                </li>
                            {!! Form::close() !!}
                            
                        </ul>
                    </td>
                </tr>

                @endforeach

            @endif
        </tbody>

    </table>



@endsection

@section('footer')
    
    @if(Session::has('Deleted'))

        <script>
                UIkit.notification({message: '{{ session('Deleted') }}', status: 'success',})
        </script>

    @endif


@stop
