@extends('Fontend.layouts.master')

@section('content')
<div class="banner text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <h1 class="mb-5">Chào bạn <br> Bạn muốn đọc gì hôm nay</h1>
                <ul class="list-inline widget-list-inline">
                    @foreach ($tags as $id => $tag)
                        <li class="list-inline-item"><a href="">{{ $tag }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>
<!-- end of banner -->
<section class="section pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">Mới nhất</h2>
                <article class="card">
                    {{-- @dd($post) --}}
                    <div class="post-slider slider-sm">
                        @if ($hot->image)
                        <img src="{{ Storage::url($hot->image) }}" class="card-img-top" alt="post-thumb">
                        @endif
                    </div>
                    <div class="card-body">
                        <h3 class="h4 mb-3"><a class="post-title" href="{{ route('client.detail', $hot->id) }}">{{ $hot->name }}</a></h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="{{ asset('clients/reader/images/john-doe.jpg') }}">
                                    <span>{{ $hot->user->name }}</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-timer"></i>{{ $hot->created_at }}
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>{{ $hot->updated_at }}
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    @foreach ($hot->tags as $tag)
                                        <li class="list-inline-item"><a>{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <p>{!! $hot->title !!}</p>
                        <a href="{{ route('client.detail', $hot->id) }}" class="btn btn-outline-primary">Đọc thêm</a>
                    </div>
                </article>
            </div>
            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">Bài viết</h2>


                @foreach ($showHome as $home)
                    <article class="card mb-4">
                        <div class="card-body d-flex">
                            @if ($home->image)
                            <img class="card-img-sm" src="{{ Storage::url($home->image) }}">
                            @endif
                            <div class="ml-3">
                                <h4><a href="{{ route('client.detail', $home->id) }}" class="post-title">{{ $home->name }}</a>
                                </h4>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>{{ $home->created_at }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">Hot nhất</h2>

                <article class="card">
                    <div class="post-slider slider-sm">
                        @if ($new->image)
                            <img src="{{ Storage::url($new->image) }}" class="card-img-top" alt="post-thumb">
                        @endif
                    </div>
                    <div class="card-body">
                        <h3 class="h4 mb-3"><a class="post-title" href="{{ route('client.detail', $new->id) }}">{{ $new->name }}</a></h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="{{ asset('clients/reader/images/kate-stone.jpg') }}" alt="Kate Stone">
                                    <span>{{ $new->user->name }}</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-timer"></i>{{ $new->created_at }}
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>{{ $new->updated_at }}
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    @foreach ($new->tags as $tag)
                                    <li class="list-inline-item"><a href="tags.html">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <p>{{ $new->title }}</p>
                        <a href="{{ route('client.detail', $new->id) }}" class="btn btn-outline-primary">Read More</a>
                    </div>
                </article>
            </div>
            <div class="col-12">
                <div class="border-bottom border-default"></div>
            </div>
        </div>
    </div>
</section>

<section class="section-sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8  mb-5 mb-lg-0">
                <h2 class="h5 section-title">Bóng đá</h2>
                @foreach ($showAll as $post_all)
                    @if ($post_all->category->name == 'Bóng đá')
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
                    @endif

                @endforeach
            </div>
            <aside class="col-lg-4 sidebar-home">
                <div class="widget widget-categories">
                    <h4 class="widget-title"><span>Categories</span></h4>
                    <ul class="list-unstyled widget-list">
                        @foreach ($categories as $id => $category)
                            <li><a href="{{ route('client.search',$id) }}" >{{ $category }}</a></li>
                        @endforeach
                    </ul>
                </div><!-- tags -->
                <div class="widget">
                    <h4 class="widget-title"><span>Tags</span></h4>
                    <ul class="list-inline widget-list-inline widget-card">
                        @foreach ($tags as $id => $tag)
                        <li class="list-inline-item"><a href="tags.html">{{ $tag }}</a></li>
                        @endforeach


                    </ul>
                </div><!-- recent post -->
                <div class="widget">
                    <h4 class="widget-title">Recent Post</h4>

                    <!-- post-item -->
                    <article class="widget-card">
                        <div class="d-flex">
                            <img class="card-img-sm" src="{{ asset('clients/reader/images/post/post-10.jpg') }}">
                            <div class="ml-3">
                                <h5><a class="post-title" href="post/elements/">Elements That You Can Use In This
                                        Template.</a></h5>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>15 jan, 2020
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="widget-card">
                        <div class="d-flex">
                            <img class="card-img-sm" src="{{ asset('clients/reader/images/post/post-3.jpg') }}">
                            <div class="ml-3">
                                <h5><a class="post-title" href="post-details.html">Advice From a Twenty
                                        Something</a></h5>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>14 jan, 2020
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="widget-card">
                        <div class="d-flex">
                            <img class="card-img-sm" src="{{ asset('clients/reader/images/post/post-7.jpg') }}">
                            <div class="ml-3">
                                <h5><a class="post-title" href="post-details.html">Advice From a Twenty
                                        Something</a></h5>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>14 jan, 2020
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Social -->
                <div class="widget">
                    <h4 class="widget-title"><span>Social Links</span></h4>
                    <ul class="list-inline widget-social">
                        <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
