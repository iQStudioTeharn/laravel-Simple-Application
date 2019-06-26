
@extends('layouts.admin')


@section('content')
    <h1>categories</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
                
            </tr>
        </thead>
        <tbody>
            @if ($cats)
                
                @foreach ($cats as $cat)

                <tr>
                    
                   
                    <td class="uk-text-middle">{{ $cat->name }}</td>
                    <td class="uk-text-middle">{{ $cat->created_at->diffForHumans() }}</td>
                    <td class="uk-text-middle">{{ $cat->updated_at->diffForHumans() }}</td>
                   
                    <td class="uk-text-middle">
                        <ul class="uk-iconnav">
                            <li><a href="{{ route('category.edit',$cat->id) }}" uk-icon="icon: file-edit" uk-tooltip="Edit"></a></li>
                            {!! Form::open(['method'=>'DELETE' , 'action'=>['AdminCategoriesConrtoller@destroy',$cat->id]]) !!}
                                
                                <li>
                                    
                                    {!! Form::label('Delete'.$cat->id, '', ['class'=>'uk-text-danger','uk-tooltip'=>"Delete",'uk-icon'=>'icon: trash']) !!}
                                    {!! Form::submit(null, ['id'=>'Delete'.$cat->id,'hidden'=>true]) !!}
                                    
                                </li>
                            {!! Form::close() !!}
                            
                        </ul>
                    </td>
                </tr>

                @endforeach

            @endif
        </tbody>

    </table>

@stop
@section('footer')
    
    @if(Session::has('Deleted'))

        <script>
                UIkit.notification({message: '{{ session('Deleted') }}', status: 'success',})
        </script>

    @endif


@stop

