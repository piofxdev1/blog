<x-dynamic-component :component="$app->componentName">

  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <!-- Hero Section -->
    <div class="position-relative">
      <!-- Main Slider -->
      <div id="heroSlider" class="js-slick-carousel slick" data-hs-slick-carousel-options='{
           "vertical": true,
           "verticalSwiping": true,
           "infinite": true,
           "autoplay": true,
           "autoplaySpeed": 10000,
           "dots": true,
           "dotsClass": "slick-pagination slick-pagination-white slick-pagination-vertical d-lg-none position-absolute bottom-0 right-0 mb-3 mr-3",
           "asNavFor": "#heroSliderNav",
           "responsive": [
             {
               "breakpoint": 576,
               "settings": {
                 "vertical": false,
                 "verticalSwiping": false
               }
             }
           ]
         }'>

        @foreach($objs as $obj)
          @if($obj->status != 0)
            <div class="js-slide d-flex gradient-x-overlay-sm-navy bg-img-hero min-h-620rem"
              style="background-image: url({{ $obj->image }});">
              <!-- News Block -->
              <div class="container d-flex align-items-center min-h-620rem">
                <div class="w-lg-40 mr-5">
                  <!-- Author -->
                  <div class="media align-items-center mb-3" data-hs-slick-carousel-animation="fadeInUp">
                    <div class="avatar avatar-sm avatar-circle mr-3">
                      <img class="avatar-img" src="{{ asset('themes/front/img/100x100/img10.jpg') }}" alt="Image Description">
                    </div>
                    <div class="media-body">
                      <a class="text-white" href="single-article.html">Christina Kray</a>
                    </div>
                  </div>
                  <!-- End Author -->

                  <div class="mb-5">
                    <h3 class="h1 font-weight-bold text-white" data-hs-slick-carousel-animation="fadeInUp"
                      data-hs-slick-carousel-animation-delay="150">{{ $obj->title }}</h3>
                  </div>
                  <a class="btn btn-primary btn-wide transition-3d-hover" href="{{ route($app->module.'.show', $obj->slug) }}"
                    data-hs-slick-carousel-animation="fadeInUp" data-hs-slick-carousel-animation-delay="300">Read Article<i
                      class="fas fa-angle-right fa-sm ml-1"></i></a>
                </div>
              </div>
              <!-- End News Block -->
            </div>
          @endif
        @endforeach
      </div>
      <!-- End Main Slider -->

      <!-- Slider Nav -->
      <div class="container slick-pagination-line-wrapper content-centered-y right-0 left-0">
        <div class="content-centered-y right-0 mr-3">
          <div id="heroSliderNav" class="js-slick-carousel slick slick-pagination-line max-w-27rem ml-auto"
            data-hs-slick-carousel-options='{
               "vertical": true,
               "verticalSwiping": true,
               "infinite": true,
               "autoplay": true,
               "autoplaySpeed": 10000,
               "slidesToShow": 3,
               "isThumbs": true,
               "asNavFor": "#heroSlider"
             }'>
             @foreach($objs as $obj)
              @if($obj->status != 0)
                <div class="js-slide my-3">
                  <span class="text-white">{{ $obj->title }}</span>

                  <span class="slick-pagination-line-progress">
                    <span class="slick-pagination-line-progress-helper"></span>
                  </span>
                </div>
              @endif
             @endforeach

          </div>
        </div>
      </div>
      <!-- End Slider Nav -->
    </div>
    <!-- End Hero Section -->

    <!-- Blogs Section -->
    <div class="container space-2 space-lg-2">
      <div class="row justify-content-lg-between">
        <div class="col-lg-8">
          @foreach($objs as $obj)
            @if($obj->status != 0)
            <!-- Blog -->
            <article class="row mb-7">
              <div class="col-md-5">
                <img class="img-fluid" src="{{ $obj->image }}" alt="Image Description">
              </div>
              <div class="col-md-7">
                <div class="card-body d-flex flex-column h-100 px-0">
                  <span class="d-block mb-2">
                    <a class="font-weight-bold text-decoration-none text-primary" href="{{ route('Category.show', $obj->category->slug) }}">{{ $obj->category->name }}</a>
                  </span>
                  <h3><a class="text-decoration-none text-dark" href="{{ route($app->module.'.show', $obj->slug) }}">{{$obj->title}}</a></h3>
                  <p>{{$obj->excerpt}}</p>
                  <div class="media align-items-center mt-auto">
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
              </div>
            </article>
            <!-- End Blog -->
            @endif
          @endforeach
        </div>

        <div class="col-lg-3">
          <div class="mb-7">
            <!-- Form -->
              <div class="row">
                <form action="{{ route($app->module.'.search') }}" method="GET">
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
              @foreach($categories as $category)
                <a type="button" href="{{ route('Category.show', $category->slug) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" aria-current="true">
                {{ $category->name }}<span class="badge bg-primary rounded-pill">{{ $category->posts->count() }}</span>
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

      {{$objs->links()}}

      <!-- Pagination -->
      <!-- <nav aria-label="Page navigation">
        <ul class="pagination mb-0">
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span class="d-none d-sm-inline-block mr-1">Next</span>
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav> -->
      <!-- End Pagination -->
    </div>
    <!-- End Blogs Section -->
  </main>
  <!-- ========== END MAIN ========== -->

</x-dynamic-component>