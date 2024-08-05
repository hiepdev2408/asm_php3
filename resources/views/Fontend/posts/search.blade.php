@extends('Fontend.layouts.master')
@section('content')
<section class="section-sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8  mb-5 mb-lg-0">

                @foreach ($search_categories as $post)
                {{-- @dd($post) --}}
                    <article class="card mb-4">
                        <div class="post-slider mb-4">
                            @if ($post->image)
                                <img src="{{ Storage::url($post->image) }}" class="card-img" alt="post-thumb">
                            @endif
                        </div>
                        <div class="card-body">
                            <h3 class="mb-3"><a class="post-title" href="{{ route('client.detail', $post->id) }}">{{ $post->name }}</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="" class="card-meta-author">
                                        <img src="{{ asset('clients/reader/images/john-doe.jpg') }}">
                                        <span>{{ $post->user->name }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-timer"></i>{{ $post->created_at }}
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>{{ $post->updated_at }}
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        @foreach ($post->tags as $tag)
                                        <li class="list-inline-item"><a>{{ $tag->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <p>{{ $post->title }}</p>
                            <a href="{{ route('client.detail', $post->id) }}" class="btn btn-outline-primary">Xem thêm</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
