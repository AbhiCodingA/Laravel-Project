@extends('homePage.master')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <main>
        <!--archive header-->
        <div class="archive-header pt-50 text-center">
            <div class="container">
                <h2 class="font-weight-900">{{ $category->name }}</h2>
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" rel="nofollow">Home</a>
                    <span></span> {{ $category->name }}
                </div>
                <div class="bt-1 border-color-1 mt-30 mb-50"></div>
            </div>
        </div>

        <div class="container">
            <div class="loop-grid mb-30">
                <div class="row">
                    @forelse($blogs as $row)
                        <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">
                            <div class="post-card-1 border-radius-10 hover-up">
                                <div class="post-thumb thumb-overlay img-hover-slide position-relative"
                                    style="background-image: url({{ asset($row->post_image) }})">
                                    <a class="img-link" href="{{ route('post.single', $row) }}"></a>
                                    <span class="top-right-icon bg-success"><i
                                            class="elegant-icon icon_camera_alt"></i></span>
                                </div>
                                <div class="post-content p-30">
                                    <div class="entry-meta meta-0 font-small mb-10">
                                        <a href="{{ route('post.single', $row) }}"><span
                                                class="post-cat text-info">{{ $row->category->name }}</span></a>
                                    </div>
                                    <div class="d-flex post-card-content">
                                        <h5 class="post-title mb-20 font-weight-900">
                                            <a href="{{ route('post.single', $row) }}">{{ $row->title }}</a>
                                        </h5>
                                        <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                            <span class="post-on">{{ $row->created_at->diffForHumans() }}</span>
                                            <span class="post-by has-dot">{{ $row->comments_count }} Comments</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @empty
                    <div style="display: flex; justify-content: center; align-items: center; text-align: center;">
                        <h2 class="text-danger">We have no blog in this category right now.</h2>
                    </div>

                    @endforelse

                </div>

            </div>
        </div>
    </main>
@endsection
