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
            </tr>
        </thead>
        <tbody>
            @if ($users)
                
                @foreach ($users as $user)

                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                    <td>
                        @if ($user->is_active == 1)
                            {{ 'Active' }}
                        @else
                            {{ 'Deactive' }}
                        @endif
                        
                    </td>
                </tr>

                @endforeach

            @endif
        </tbody>

    </table>



@endsection