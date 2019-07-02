
@extends('layouts.admin')



@section('content')
    
    <h1>Comments</h1>
     
     @if ($comments)
         
        <table class="table">
            <thead>
                <th>User</th>
                <th>Comment</th>
                <th>At Post/Comment</th>
                <th>Approved</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Action</th>
            </thead>
            <tbody>
                
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->author }}</td>
                        <td>{{ $comment->body }}</td>
                        <td><a href='{{ route('home.post',$comment->posts->id) }}'>{{ $comment->posts->title }}</a></td>
                        <td>{{ $comment->is_active == 1 ? 'Y' : 'N' }}</td>
                        <td>{{ $comment->created_at->diffForHumans() }}</td>
                        <td>{{ $comment->updated_at->diffForHumans() }}</td>
                        <td>
                            <ul class="uk-iconnav">
                                
                                @if ($comment->is_active == 0)
                                    
                                    {!! Form::open(['method'=>'PATCH' , 'action'=>['CommentController@update',$comment->id]]) !!}
                                        
                                        <li>
                                            
                                            {!! Form::label('Edit'.$comment->id, '', ['class'=>'uk-text-success','uk-icon'=>"icon: check; ratio: 1.2" ,'uk-tooltip'=>"Approve"]) !!}
                                            {!! Form::submit('is_active', ['id'=>'Edit'.$comment->id,'hidden'=>true]) !!}
                                            
                                        </li>

                                    {!! Form::close() !!}

                                @endif
                                
            
                                {!! Form::open(['method'=>'DELETE' , 'action'=>['CommentController@destroy',$comment->id]]) !!}
                                    
                                    <li>
                                        
                                        {!! Form::label('Delete'.$comment->id, '', ['class'=>'uk-text-danger','uk-tooltip'=>"Delete",'uk-icon'=>'icon: trash']) !!}
                                        {!! Form::submit(null, ['id'=>'Delete'.$comment->id,'hidden'=>true]) !!}
                                        
                                    </li>
                                {!! Form::close() !!}
                                
                            </ul>
                        </td>
                    </tr>
                    
                    @if ($comment->replies)
                        
                        @foreach ($comment->replies as $reply)
                        <tr>
                            <td>{{ $reply->author }}</td>
                            <td>{{ $reply->body }}</td>
                            <td>{{ $reply->comment->body }}</td>
                            <td>{{ $reply->is_active == 1 ? 'Y' : 'N' }}</td>
                            <td>{{ $reply->created_at->diffForHumans() }}</td>
                            <td>{{ $reply->updated_at->diffForHumans() }}</td>
                            <td>
                                <ul class="uk-iconnav">
                                    
                                    @if ($reply->is_active == 0)
                                        
                                        {!! Form::open(['method'=>'PATCH' , 'action'=>['CommentReplyController@update',$reply->id]]) !!}
                                            
                                            <li>
                                                
                                                {!! Form::hidden('is_active', $reply->id) !!}
                                                
                                                {!! Form::label('Edit'.$reply->id, '', ['class'=>'uk-text-success','uk-icon'=>"icon: check; ratio: 1.2" ,'uk-tooltip'=>"Approve"]) !!}
                                                {!! Form::submit(null, ['id'=>'Edit'.$reply->id,'hidden'=>true]) !!}
                                                
                                            </li>

                                        {!! Form::close() !!}

                                    @endif
                                    
                
                                    {!! Form::open(['method'=>'DELETE' , 'action'=>['CommentReplyController@destroy',$reply->id]]) !!}
                                        
                                        <li>
                                            {!! Form::hidden('is_active', $reply->id) !!}
                                            
                                            {!! Form::label('Delete'.$reply->id, '', ['class'=>'uk-text-danger','uk-tooltip'=>"Delete",'uk-icon'=>'icon: trash']) !!}
                                            {!! Form::submit(null, ['id'=>'Delete'.$reply->id,'hidden'=>true]) !!}
                                            
                                        </li>
                                    {!! Form::close() !!}
                                    
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                        
                    @endif
                    
                @endforeach
                
            </tbody>

        </table>



     @endif
     


@stop

