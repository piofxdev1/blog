<x-dynamic-component :component="$app->componentName">  

<!-- ========== MAIN ========== -->
<main id="content" role="main">
<!-- Article Description Section -->
<div class="container space-top-1 space-bottom-2">
    <div class="w-lg-60 mx-lg-auto">

        <!-- Featured Image -->
        <div class="my-3">
            <img src="{{ $obj->image }}" class="img-fluid">
        </div>
        <!-- ENd Featured Image -->

        <div class="mt-5 mb-3">
            <h1>{{$obj->title}}</h1>
            <a href="{{ route('Category.show', $obj->category->slug) }}" class="h5 text-decoration-none"><span class="badge badge-dark">{{ $obj->category->name }}</span></a>
        </div>

        <!-- Author -->
        <div class="border-top border-bottom py-4 mb-5">
            <div class="row align-items-md-center">
            <div class="col-md-7 mb-5 mb-md-0">
                <div class="media align-items-center">
                <div class="avatar avatar-circle">
                    <img class="avatar-img" src="{{ asset('themes/front/img/100x100/img11.jpg') }}" alt="Image Description">
                </div>
                <div class="media-body font-size-1 ml-3">
                    <span class="h6"><a href="blog-profile.html">Hanna Wolfe</a> <button type="button" class="btn btn-xs btn-soft-primary font-weight-bold transition-3d-hover py-1 px-2 ml-1">Follow</button></span>
                    <span class="d-block text-muted">July 15, 2018</span>
                </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="d-flex justify-content-md-end align-items-center">
                <span class="d-block small font-weight-bold text-cap mr-2">Share:</span>

                <a class="btn btn-xs btn-icon btn-soft-secondary rounded-circle ml-2" href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="btn btn-xs btn-icon btn-soft-secondary rounded-circle ml-2" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="btn btn-xs btn-icon btn-soft-secondary rounded-circle ml-2" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="btn btn-xs btn-icon btn-soft-secondary rounded-circle ml-2" href="#">
                    <i class="fab fa-telegram"></i>
                </a>
                </div>
            </div>
            </div>
        </div>
        <!-- End Author -->

        {!! $obj->content !!}

        <div class="card bg-img-hero bg-navy text-white text-center p-4 my-4" style="background-image: url({{ asset('themes/front/svg/components/abstract-shapes-1.svg') }});">
            <h4 class="text-white mb-3">Like what you're reading? Subscribe to our top stories.</h4>

            <!-- Form -->
            <form class="js-validate w-md-75 mx-md-auto">
            <div class="js-form-message">
                <div class="d-flex align-items-center">
                <label class="sr-only" for="subscribeSrArticle">Subscribe</label>
                <div class="input-group">
                    <input type="email" class="form-control" id="subscribeSrArticle" placeholder="Your email" aria-label="Your email">
                </div>
                <button type="submit" class="btn btn-light ml-3">Submit</button>
                </div>
            </div>
            </form>
            <!-- End Form -->
        </div>

        <p>Follow us on <a href="#">Medium</a>, <a href="#">Twitter</a>, <a href="#">Facebook</a>, <a href="#">YouTube</a>, and <a href="#">Dribbble</a>.</p>

        <!-- Tags -->
        <div class="mt-4">
            <h4>Tags</h4>
            @foreach($obj->tags as $tag)
            <a class="btn btn-xs btn-outline-dark mb-1" href="{{ route('Tag.show', $tag->slug) }}">{{ $tag->name }}</a>
            @endforeach
        </div>
        <!-- End Tags -->

        <!-- Share -->
        <div class="row justify-content-sm-between align-items-sm-center mt-5">
            <div class="col-sm-6 mb-2 mb-sm-0">
            <div class="d-flex align-items-center">
                <span class="d-block small font-weight-bold text-cap mr-2">Share:</span>

                <a class="btn btn-xs btn-icon btn-ghost-secondary rounded-circle mr-2" href="#">
                <i class="fab fa-facebook-f"></i>
                </a>
                <a class="btn btn-xs btn-icon btn-ghost-secondary rounded-circle mr-2" href="#">
                <i class="fab fa-twitter"></i>
                </a>
                <a class="btn btn-xs btn-icon btn-ghost-secondary rounded-circle mr-2" href="#">
                <i class="fab fa-instagram"></i>
                </a>
                <a class="btn btn-xs btn-icon btn-ghost-secondary rounded-circle mr-2" href="#">
                <i class="fab fa-telegram"></i>
                </a>
            </div>
            </div>

            <div class="col-sm-6 text-sm-right">
            <a class="btn btn-xs btn-icon btn-soft-secondary rounded-circle mr-2" href="#" data-toggle="tooltip" data-placement="top" title="Bookmark story">
                <i class="far fa-bookmark"></i>
            </a>
            <a class="btn btn-xs btn-icon btn-soft-secondary rounded-circle" href="#" data-toggle="tooltip" data-placement="top" title="Report story">
                <i class="far fa-flag"></i>
            </a>
            </div>
        </div>
        <!-- End Share -->

        <!-- Author -->
        <div class="media align-items-center border-top border-bottom py-5 my-8">
            <div class="avatar avatar-circle avatar-xl">
            <img class="avatar-img" src="{{ asset('themes/front/img/100x100/img11.jpg') }}" alt="Image Description">
            </div>
            <div class="media-body ml-3">
            <small class="d-block small font-weight-bold text-cap">Written by</small>
            <h3 class="mb-0"><a href="blog-profile.html">Hanna Wolfe</a> <button type="button" class="btn btn-xs btn-soft-primary font-weight-bold transition-3d-hover py-1 px-2 ml-1">Follow</button></h3>
            <p class="mb-0">I create advanced website builders made exclusively for web developers.</p>
            </div>
        </div>
        <!-- End Author -->

        <div class="pt-2 mb-11">
            <div class="mb-4">
            <h3>3 Comments</h3>
            </div>

            <ul class="list-unstyled">
            <!-- Comment -->
            <li class="mb-5">
                <div class="media align-items-center mb-2">
                <div class="avatar avatar-circle mr-3">
                    <img class="avatar-img" src="{{ asset('themes/front/img/100x100/img3.jpg') }}" alt="Image Description">
                </div>
                <div class="media-body">
                    <div class="d-flex justify-content-between align-items-center">
                    <span class="h5 mb-0">Dave Austin</span>
                    <small class="text-muted">1 day ago</small>
                    </div>
                </div>
                </div>

                <p>As a Special Education teacher this resonates so well with me. Fighting with gen ed teachers to flatten for the students with learning disabilities. It also confirms some things for me in my writing.</p>

                <a class="font-weight-bold" href="#">Reply</a>

                <ul class="list-unstyled mt-5">
                <!-- Comment -->
                <li class="mb-5">
                    <div class="border-left border-3 pl-4">
                    <div class="media align-items-center mb-2">
                        <div class="avatar avatar-circle mr-3">
                        <img class="avatar-img" src="{{ asset('themes/front/img/100x100/img11.jpg') }}" alt="Image Description">
                        </div>
                        <div class="media-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 mb-0">Hanna Wolfe</span>
                            <small class="text-muted">1 day ago</small>
                        </div>
                        </div>
                    </div>

                    <p>Love it Dave! We're all about keeping it up.</p>

                    <a class="font-weight-bold" href="#">Reply</a>
                    </div>
                </li>
                <!-- End Comment -->
                </ul>
            </li>
            <!-- End Comment -->

            <!-- Comment -->
            <li class="mb-5">
                <div class="media align-items-center mb-2">
                <div class="avatar avatar-circle mr-3">
                    <img class="avatar-img" src="{{ asset('themes/front/img/100x100/img1.jpg') }}" alt="Image Description">
                </div>
                <div class="media-body">
                    <div class="d-flex justify-content-between align-items-center">
                    <span class="h5 mb-0">Christina Kray</span>
                    <small class="text-muted">2 days ago</small>
                    </div>
                </div>
                </div>

                <p>Since our attention spans seem to be shrinking by the day — keeping it simple is more important than ever.</p>

                <a class="font-weight-bold" href="#">Reply</a>
            </li>
            <!-- End Comment -->
            </ul>
        </div>

        <div class="mb-5">
            <h3>Post a comment</h3>
        </div>

        <!-- Form -->
        <form class="js-validate">
            <div class="form-row">
            <div class="col-sm-6 mb-sm-3">
                <div class="js-form-message form-group">
                <label class="input-label">Name</label>
                <input type="text" class="form-control" name="name" id="inputName" placeholder="Name" aria-label="Name" required
                        data-msg="Please enter your name.">
                </div>
            </div>

            <div class="col-sm-6 mb-sm-3">
                <div class="js-form-message form-group">
                <label class="input-label">Email</label>
                <input type="email" class="form-control" name="emailAddress" id="emailAddress" placeholder="Email address" aria-label="Email address" required
                        data-msg="Please enter a valid email address.">
                </div>
            </div>

            <div class="col-12 mb-sm-3">
                <div class="js-form-message form-group">
                <label class="input-label">Comment</label>
                <textarea class="form-control" rows="7" id="descriptionTextarea" placeholder="Comment" required
                            data-msg="Please enter your message."></textarea>
                </div>
            </div>
            </div>

            <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-wide transition-3d-hover">Submit</button>
            </div>
        </form>
        <!-- End Form -->
    </div>
</div>
<!-- End Article Description Section -->

<!-- Blog Card Section -->
<div class="container">
    <div class="w-lg-75 border-top mx-lg-auto">
        <div class="my-3">
            <h3 class="font-weight-bold">Related stories</h3>
        </div>

        <div class="row">
            @foreach($obj->category->posts as $post)
                @if($post->id != $obj->id)
                    <div class="col-md-6 mb-3">
                        <!-- Blog Card -->
                        <div class="row justify-content-between">
                            <div class="col-4">
                                <img class="img-fluid" src="{{ $post->image }}" alt="Image Description">
                            </div>
                            <div class="col-8">
                                <h4 class="mb-0"><a class="text-decoration-none text-dark" href="">{{ $post->title }}</a></h4>
                                <p class="text-muted">{{ $post->excerpt }}</p>
                            </div>
                        </div>
                        <!-- End Blog Card -->
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- End Blog Card Section -->

</main>
<!-- ========== END MAIN ========== -->

</x-dynamic-component>