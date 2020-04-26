@extends('master')

@section('content')
    <div class="hero-area container-fluid">
        <div class="row">
            <div class="col-md-5 col-sm-10 col-xs-10 mx-auto">
                <h1>Agrishi</h1>
                <p>Banquet Halls and Wedding Reception Venues</p>
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Blog..." name="q">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
                @if (session()->has('error'))
                    <p class="error-msg">{{ session('error') }}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="container">
        <div class="posts-list row">
            @foreach($posts as $post)
                <div class="col-md-4 col-sm-12">
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                        <a href="/blog/{{$post->slug}}">
                            <img class="card-img-top" height="200" src="{{ $post->featured_image }}" alt="{{$post->title}}">
                        </a>
                        <div class="card-body">
                            <p class="card-text">
                                {{ str_limit($post->excerpt, 160, '...') }}
                            </p>
                            <small>Publication Date: {{ $post->publish_date->format('dS M Y') }}</small>
                            <!-- Tags -->
                            @if($post->tags)
                                <div class="tags">
                                    @foreach($post->tags as $tag)
                                        <span class="badge badge-secondary">{{$tag->name}}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="footer">
        <div class="boxed-layout">
            <div>Coppyright 2020 &copy; Agrishi</div>
        </div>
    </div>
@endsection