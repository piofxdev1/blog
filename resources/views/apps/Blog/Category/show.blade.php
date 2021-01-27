<x-dynamic-component :component="$app->componentName">
  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <!-- Hero Section -->
    <div class="bg-dark bg-img-hero space-lg-3"
        style="background-image: url({{ $category->image }});">
        <div class="container ">
            <div class="w-lg-65 text-center mx-lg-auto">
                <h5 class="mb-3"><span class="badge badge-dark p-3 text-warning">{{ $category->name }}</span></h5>
                <div class="bg-dark p-3 rounded-lg">
                  <h1 class="text-white mb-0">{{ $category->description }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Blogs Section -->
    <div class="container space-1 space-lg-2">
        <div class="row justify-content-lg-between">
            <div class="col-lg-8">
              @foreach($posts as $post)
                <!-- Blog -->
                <article class="row mb-7">
                    <div class="col-md-5">
                        <img class="card-img" src="{{ $post->image }}" alt="Image Description">
                    </div>
                    <div class="col-md-7">
                      <div class="card-body d-flex flex-column h-100 px-0">
                          <h3><a class="text-inherit text-decoration-none" href="{{ route('Post.show', $post->slug) }}">{{ $post->title }}</a>
                          </h3>
                          <p>{{ $post->excerpt }}</p>
                          <div class="media align-items-center mt-auto">
                              <a class="avatar avatar-sm avatar-circle mr-3" href="blog-profile.html">
                                  <img class="avatar-img" src="{{ asset('themes/front/img/100x100/img3.jpg') }}"
                                      alt="Image Description">
                              </a>
                              <div class="media-body">
                                  <span class="text-dark">
                                      <a class="d-inline-block text-inherit font-weight-bold"
                                          href="blog-profile.html">Aaron Larsson</a>
                                  </span>
                                  <small class="d-block">Feb 15, 2020</small>
                              </div>
                          </div>
                      </div>
                    </div>
                </article>
              @endforeach
            </div>
            <!-- End Blog -->

        <div class="col-lg-3">
          <div class="mb-7">
            <!-- Form -->
              <div class="row">
                <form action="{{ route('Post.search') }}" method="GET">
                  <div class="input-group mb-3"> 
                    <input type="text" class="form-control input-text" placeholder="Search..." name="query">
                    <div class="input-group-append">
                      <button class="btn btn-outline-primary btn-md" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            <!-- End Form -->
          </div>
          <!---------Categories section-----> 
          <div class="mb-5">
            <h5 class="font-weight-bold mb-3">Categories</h5>
            <div class="list-group">
              @foreach($objs as $obj)
                <a type="button" href="{{ route('Category.show', $obj->slug) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" aria-current="true">
                {{ $obj->name }}<span class="badge bg-primary rounded-pill">{{ $obj->posts->count() }}</span>
                </a>
              @endforeach
            </div>
          </div>
          <!--------- End categories section----->

          <!----- Tags section------>
          <div class="mb-5">
            <h5 class="font-weight-bold mb-3">Tags</h5>
            @foreach($tags as $tag)
              <a class="btn btn-sm btn-outline-dark mb-1" href="{{ route('Tag.show', $tag->slug) }}">{{ $tag->name }}</a>
            @endforeach
          </div>
          <!----- End Tags Section------>

          <div class="mb-7">
            <div class="mb-3">
              <h3>Popular</h3>
            </div>

            <!-- Blog -->
            <article class="mb-5">
              <div class="media align-items-center text-inherit">
                <div class="avatar avatar-lg mr-3">
                  <img class="avatar-img" src="{{ asset('themes/front/img/320x320/img1.jpg') }}" alt="Image Description">
                </div>
                <div class="media-body">
                  <h4 class="h6 mb-0"><a class="text-inherit" href="#">Announcing a free plan for small teams</a></h4>
                </div>
              </div>
            </article>
            <!-- End Blog -->

            <!-- Blog -->
            <article class="mb-5">
              <div class="media align-items-center text-inherit">
                <div class="avatar avatar-lg mr-3">
                  <img class="avatar-img" src="{{ asset('themes/front/img/320x320/img10.jpg') }}" alt="Image Description">
                </div>
                <div class="media-body">
                  <h4 class="h6 mb-0"><a class="text-inherit" href="#">Mapping the first family tree for Front
                      office</a></h4>
                </div>
              </div>
            </article>
            <!-- End Blog -->

            <!-- Blog -->
            <article class="mb-5">
              <div class="media align-items-center text-inherit">
                <div class="avatar avatar-lg mr-3">
                  <img class="avatar-img" src="{{ asset('themes/front/img/320x320/img9.jpg') }}" alt="Image Description">
                </div>
                <div class="media-body">
                  <h4 class="h6 mb-0"><a class="text-inherit" href="#">Felline eyeing first major Classic win in
                      2018</a></h4>
                </div>
              </div>
            </article>
            <!-- End Blog -->
          </div>

        </div>
      </div>

    {{$posts->links()}}

    </div>
    <!-- End Blogs Section -->
  </main>
  <!-- ========== END MAIN ========== -->

</x-dynamic-component>