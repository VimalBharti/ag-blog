
@extends('master')

@section('content')

    <div class="single-post">
        <div class="featured-image" style="background-image: url('{{ $post->featured_image }}');background-size:cover;background-position:center-webkit-filter: blur(5px);filter: blur(5px);"></div>
        
        <div class="post-details container-fluid">
            <div class="logo">
                <a href="/">Agrishi</a>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-12 mx-auto">
                    <div class="shadow-lg">
                        <div class="featured-image-single">
                            <img class="img-fluid" src="{{ $post->featured_image }}" alt="{{$post->title}}">
                        </div>
                        <div class="post-body">
                            <h2>{{ $post->title }}</h2>
                            <i>{{ $post->publish_date->format('dS M Y') }}</i>
                            @if($post->tags)
                                <div class="tags">
                                    @foreach($post->tags as $tag)
                                        <button type="button" class="btn btn-secondary btn-sm">{{$tag->name}}</button>
                                    @endforeach
                                </div>
                            @endif
                            <div class="post-content">
                                {!! $post->body !!} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection