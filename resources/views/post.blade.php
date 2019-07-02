
@extends('layouts.blog-post')



@section('content')

    
   
    

    <div class="container">
        @if (Session::has('comment_message'))
            <div class="uk-alert-success" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                {{ Session('comment_message') }}
            </div>
        @endif
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $post->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{ $post->user->name }}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans() }}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="/images/{{ $post->photo->profileImage }}" alt="">

                <hr>

                <!-- Post Content -->
                <article></article>
                

                <!-- Blog Comments -->

                <!-- Comments Form -->
                
                @if (Auth::check())
                    <hr>
                    <div class="well">
                        <h4>Leave a Comment:</h4>
                        
                        {!! Form::open(['method'=>'POST','action'=>'CommentController@store']) !!}
                        

                        
                        {!! Form::hidden('posts_id', $post->id) !!}
                        
                        <div class="uk-margin uk-width-1-1">
                            <div class="uk-width-1-1 ">
                                {!! Form::label('body', 'Comment', ['class'=>'uk-form-label uk-text-meta']) !!}
                                {!! Form::textarea('body', null, ['id'=>'body','class'=>'uk-textarea']) !!}
                            </div>
                        </div>
                        <div class="uk-margin uk-width-1-1">
                            <div class="uk-width-1-1 ">
                                
                                {!! Form::submit('Submit Comment', ['class'=>'uk-button uk-button-primary']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>    
                    <hr>
                @endif
                

                

                <!-- Posted Comments -->
                    
                @if ($post->comments)
                
                    
                    @foreach ($post->comments as $comment)
                        
                        @if ($comment->is_active == 1)
                            
                            <!-- Comment -->
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $comment->author }}
                                        <small>{{ $comment->updated_at->diffForHumans() }}</small>
                                    </h4>
                                    {{ $comment->body }}
                                    
                                    @if ($comment->replies)
                                        
                                        @foreach ($comment->replies as $reply)
                                            
                                            @if ($reply->is_active == 1)
                                                <!-- Nested Comment -->
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">{{ $reply->author }}
                                                            <small>{{ $reply->updated_at->diffForHumans() }}</small>
                                                        </h4>
                                                        {{ $reply->body }}
                                                    </div>
                                                </div>
                                                
                                                <!-- End Nested Comment -->
                                            @endif
                                            
                                        @endforeach
                                        
                                        

                                    @endif
                                    
                                </div>
                                @if (Auth::check())
                                    <hr>
                                    <h4 class="leaveReply">Leave a Reply:</h4>
                                    <div class="well replyForm">
                                        
                                        
                                            {!! Form::open(['method'=>'POST','action'=>'CommentReplyController@store']) !!}
                                        

                                        
                                            {!! Form::hidden('comment_id', $comment->id) !!}
                                            
                                            <div class="uk-margin uk-width-1-1">
                                                <div class="uk-width-1-1 ">
                                                    {!! Form::label('body', 'Comment', ['class'=>'uk-form-label uk-text-meta']) !!}
                                                    {!! Form::textarea('body', null, ['id'=>'body','class'=>'uk-textarea']) !!}
                                                </div>
                                            </div>
                                            <div class="uk-margin uk-width-1-1">
                                                <div class="uk-width-1-1 ">
                                                    
                                                    {!! Form::submit('Submit Comment', ['class'=>'uk-button uk-button-primary']) !!}
                                                </div>
                                            </div>

                                            {!! Form::close() !!}
                                        
                                        
                                    </div>    
                                    <hr>
                                @endif
                            </div>


                        @endif
                        
                    @endforeach
                        

                @endif

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        

    </div>

@stop
