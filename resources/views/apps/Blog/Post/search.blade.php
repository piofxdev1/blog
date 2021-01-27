<x-dynamic-component :component="$app->componentName">

    <!-- ========== MAIN ========== -->
    <main id="content" role="main">
        <!-- Hero Section -->
        <div class="position-relative z-index-2">
            <!-- Content -->
            <div class="d-md-flex">
                <div class="container d-md-flex  mt-3 text-center">
                    <div class="w-lg-85 mx-lg-auto">
                        <!-- Info -->
                        <div class="mt-5">
                            <h1 class="text-dark mb-3">Search for Posts</h1>
                        </div>
                        <!-- End Info -->
                        <!-- Form -->
                        <form action="" class="mx-lg-auto" method="GET">
                            <div class="card p-3 border rounded-lg">
                                <div class="form-row input-group-borderless">
                                    <div class="col-sm mb-2 mb-md-0">
                                        <input type="text" class="form-control shadow-none" name="query"
                                            placeholder="Search Something...">
                                    </div>
                                    <div class="col-sm d-sm-none">
                                        <hr class="my-0">
                                    </div>
                                    <div class="col-md-auto d-flex align-items-center">
                                        <button type="submit" class="btn btn-block btn-outline-primary btn-wide">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
            </div>
            <!-- End Content -->
        </div>
        <!-- End Hero Section -->
        
        <!-- Results Section -->
        <div class="container space-1">
            <div class="row mx-n2 mx-lg-n3">
                @if($objs->isNotEmpty())
                    @foreach($objs as $obj)
                    <div class="col-sm-6 col-lg-4 px-2 px-lg-3 py-5 rounded-lg">
                        <!-- Card -->
                        <div class="card flex-wrap flex-row text-dark">
                            <div class="text-center">
                                <figure class="max-w-37rem w-100 mx-auto mb-4">
                                    <img class="img-fluid rounded" src="{{ $obj->image }}"
                                        alt="Image Description">
                                </figure>
                                <h3>{{$obj->title}}</h3>
                                <p>{{$obj->excerpt}}</p>
                                <hr class="mx-2 my-0">
                            </div>
                            <div class="media align-items-center my-3 pl-3">
                                <a class="avatar avatar-sm avatar-circle mr-3" href="blog-profile.html">
                                    <img class="avatar-img" src="{{ asset('themes/front/img/100x100/img3.jpg') }}" alt="Image Description">
                                </a>
                                <div class="media-body">
                                    <span class="text-dark">
                                        <a class="d-inline-block text-inherit font-weight-bold" href="blog-profile.html">Aaron Larsson</a>
                                    </span>
                                    <small class="d-block">Feb 15, 2020</small>
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    @endforeach
                @else
                    <div class="container text-center p-3 my-5 bg-light">
                        <h3 class="text-danger">No posts Available</h3>
                    </div>
                @endif
            </div>
            {{ $objs->links() }}
        </div>

        <!-- End Results Section -->
    </main>
    <!-- ========== END MAIN ========== -->


</x-dynamic-component>