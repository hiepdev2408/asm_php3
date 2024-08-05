@extends('Fontend.layouts.master')
@section('content')
<section class="section-sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8  mb-5 mb-lg-0">

                @foreach ($data as $post_all)
                <h2 class="h5 section-title">{{ $post_all->category->name }}</h2>
                    <article class="card mb-4">
                        <div class="post-slider">
                            @if ($post_all->image)
                                <img src="{{ Storage::url($post_all->image) }}" class="card-img-top" alt="post-thumb">
                            @endif
                        </div>
                        <div class="card-body">
                            <h3 class="mb-3"><a class="post-title" href="{{ route('client.detail', $post_all->id) }}">{{ $post_all->name }}</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="" class="card-meta-author">
                                        <img src="{{ asset('clients/reader/images/john-doe.jpg') }}">
                                        <span>{{ $post_all->user->name }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-timer"></i>{{ $post_all->created_at }}
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>{{ $post_all->updated_at }}
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        @foreach ($post_all->tags as $tag)
                                        <li class="list-inline-item"><a>{{ $tag->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <p>{{ $post_all->title }}</p>
                            <a href="{{ route('client.detail', $post_all->id) }}" class="btn btn-outline-primary">Xem thêm</a>
                        </div>
                    </article>
                @endforeach
                {{ $data->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
