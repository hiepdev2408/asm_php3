@extends('Fontend.layouts.master')
@section('content')
    <section class="section">
        <div class="container">
            <h3>Danh mục / {{ $posts->category->name }}</h3>
            <div class="row justify-content-center">
                <div class=" col-lg-9   mb-5 mb-lg-0">
                        <article>
                            <div class="post-slider mb-4">
                                @if ($posts->image)
                                    <img src="{{ Storage::url($posts->image) }}" class="card-img" alt="post-thumb">
                                @endif
                            </div>

                            <h1 class="h2">{{ $posts->name }}
                            </h1>
                            <ul class="card-meta my-3 list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">

                                        <span>{{ $posts->user->name }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-timer"></i>{{ $posts->created_at }}
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>{{ $posts->updated_at }}
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        @foreach ($posts->tags as $id => $tag)
                                        <li class="list-inline-item"><a href="{{ $tag->id }}">{{ $tag->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <div class="content">
                                <p>{{ $posts->title }}</p>
                                <p>{!! $posts->content !!}</p>
                            </div>
                        </article>

                </div>

            </div>
        </div>
    </section>
@endsection
