@extends('layouts.admin')


@section('content')
    
    <h1>Posts</h1>
    <table class="table">
        <thead>
            <tr>
                <th>title</th>
                <th>Body</th>
                <th>Category</th>
                <th>User</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($posts)
                
                @foreach ($posts as $post)

                <tr>
                    
                    <td class="uk-text-middle">
                        <img src="/images/{{ $post->photo ? $post->photo->profileImage : 'profile.jpeg' }}" alt="postProfile" width="70" height="70"  class="uk-border-rounded">
                        <a href="{{ route('home.post',$post->slug) }}">{{ $post->title }}</a>
                    </td>
                    <td class="uk-text-middle">{{ str_limit($post->body,50) }}</td>
                    <td class="uk-text-middle">{{ !empty($post->category->name) ? $post->category->name : 'uncategorized' }}</td>
                    <td class="uk-text-middle">{{ $post->user->name }}</td>
                    <td class="uk-text-middle">{{ $post->created_at->diffForHumans() }}</td>
                    <td class="uk-text-middle">{{ $post->updated_at->diffForHumans() }}</td>
                    <td class="uk-text-middle">
                        @if ($post->status == 1)
                            {{ 'Published' }}
                        @else
                            {{ 'Draft' }}
                        @endif
                        
                    </td>
                    <td class="uk-text-middle">
                        <ul class="uk-iconnav">
                            <li><a href="{{ route('posts.edit',$post->id) }}" uk-icon="icon: file-edit" uk-tooltip="Edit"></a></li>
                            {!! Form::open(['method'=>'DELETE' , 'action'=>['AdminPostsController@destroy',$post->id]]) !!}
                                
                                <li>
                                    
                                    {!! Form::label('Delete'.$post->id, '', ['class'=>'uk-text-danger','uk-tooltip'=>"Delete",'uk-icon'=>'icon: trash']) !!}
                                    {!! Form::submit(null, ['id'=>'Delete'.$post->id,'hidden'=>true]) !!}
                                    
                                </li>
                            {!! Form::close() !!}
                            
                        </ul>
                    </td>
                </tr>

                @endforeach

            @endif
        </tbody>

    </table>

    <div class="row">
            <div class="col-sm-6">
                {{ $posts->render() }}
            </div>
        </div>

@endsection

@section('footer')
    
    @if(Session::has('Deleted'))

        <script>
                UIkit.notification({message: '{{ session('Deleted') }}', status: 'success',})
        </script>

    @endif


@stop
