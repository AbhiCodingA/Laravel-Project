@extends('homePage.master')

@section('title')
    {{ $post->title }}
@endsection

@section('meta')
    <meta name="tags" content="{{ $post->post_meta_tags }}" />
    <meta name="description" content="{{ $post->post_meta_title }}" />
@endsection

@section('content')
    <main class="bg-grey pb-30">

        <div class="container single-content">
            <div class="entry-header pt-80 pb-30 mb-20">
                <div class="row">
                    <div class="col-md-6 mb-md-0 mb-sm-3 align-self-center">
                        <figure class="mb-0 mt-lg-0 mt-3 border-radius-5">
                            <img class=" border-radius-5" src="{{ asset($post->post_image) }}" width="600px" height="400px"
                                alt="post image">
                        </figure>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="post-content">
                            <div class="entry-meta meta-0 mb-15 font-small">
                                <a href="{{ route('home.category', $post->category->slug) }}"><span
                                        class="post-cat position-relative text-info">{{ $post->category->name }}</span></a>
                            </div>
                            <h1 class="entry-title mb-30 font-weight-900">
                                {{ $post->title }}
                            </h1>
                            <p class="excerpt mb-30">
                                {{ $post->excerpt }}
                            </p>
                            <div class="entry-meta align-items-center meta-2 font-small color-muted">
                                <p class="mb-5">
                                    <a class="author-avatar" href="#"><img class="img-circle"
                                            src="{{ asset($admin->image) }}" alt=""></a>
                                    By <a href="#"><span
                                            class="author-name font-weight-bold">{{ $admin->name }}</span></a>
                                </p>
                                <span class="mr-10"> {{ $post->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--end single header-->

            <!--figure-->
            <article class=" mb-50">
                <div class="entry-main-content wow fadeIn animated" style="padding-bottom: 50px;">
                    <p class="dropcap-text">{!! $post->body !!}</p>
                </div>


                <!--related posts-->

                <div class="related-posts">
                    <div class="post-module-3">
                        <div class="widget-header-2 position-relative mb-30">
                            <h5 class="mt-5 mb-30">Recent posts</h5>
                        </div>
                        <div class="loop-list loop-list-style-1">
                            @foreach ($recent_posts as $blog)
                                <article class="hover-up-2 transition-normal wow fadeInUp  animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative"
                                                    style="background-image: url({{ asset($blog->post_image) }})">
                                                    <a class="img-link" href="{{ route('post.single', $blog) }}"></a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="#"><span
                                                            class="post-cat text-primary">{{ $blog->category->name }}</span></a>
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="{{ route('post.single', $blog) }}">{{ $blog->title }}</a>
                                                    <span class="post-format-icon"><i
                                                            class="elegant-icon icon_star_alt"></i></span>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">{{ $blog->created_at->format('d M Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach

                        </div>
                    </div>
                </div>

            </article>
        </div>
    </main>
@endsection
