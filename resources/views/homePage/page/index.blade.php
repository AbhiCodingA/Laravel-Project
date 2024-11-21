@extends('homePage.master')

@section('title')
    {{ $page->page_title }}
@endsection

@section('content')
    <main class="bg-grey pb-30 mb-50">

        <div class="container single-content">
            <div class="entry-header pt-80 pb-30 mb-20">
                <div class="row">
                    <div class="col-md-6 mb-md-0 mb-sm-3">
                        <figure class="mb-0 mt-lg-0 mt-3 border-radius-5">
                            <img class=" border-radius-5" src="{{ asset($page->page_image) }}" alt="post image" width="600px"
                                height="400px">
                        </figure>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="post-content">
                            <h1 class="entry-title mb-30 font-weight-900">
                                {{ $page->page_title }}
                            </h1>
                            <div class="entry-meta align-items-center meta-2 font-small color-muted">
                                <p class="mb-5">
                                    <a class="author-avatar" href="#"><img class="img-circle"
                                            src="{{ asset($admin->image) }}" alt=""></a>
                                    By <a href="#"><span
                                            class="author-name font-weight-bold">{{ $admin->name }}</span></a>
                                </p>
                                <span class="mr-10"> {{ $page->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="entry-main-content wow fadeIn animated" style="padding-bottom: 50px;">
                <p class="dropcap-text">{{ $page->page_description }}</p>
            </div>
        </div>

    </main>
@endsection
