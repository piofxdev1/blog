<!-- ========== HEADER ========== -->
<header id="header" class="header nav-shadow bg-light">
    <div id="logoAndNav" class="container">
        <!-- Nav -->
        <nav class="navbar navbar-expand-lg d-flex justify-content-between">
            <!-- Logo -->
            <a href="/blog" aria-label="Front">
                <img src="{{ asset('themes/front/img/piofx-black.png') }}" width="100" alt="Logo">
            </a>
            <!-- End Logo -->

            <div>
                <a class="signup_btn ml-3 d-lg-none" href="#">Begin</a>

                <!-- Responsive Toggle Button -->
                <button type="button" class="navbar-toggler btn btn-icon btn-ghost-dark" aria-label="Toggle navigation"
                aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                <span class="navbar-toggler-default">
                    <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor"
                        d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z" />
                    </svg>
                </span>
                <span class="navbar-toggler-toggled">
                    <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor"
                        d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                    </svg>
                </span>
                </button>
                <!-- End Responsive Toggle Button -->
            </div>

            <!-- Navigation -->
            <div id="navBar" class="collapse navbar-collapse ">
                <ul class="navbar-nav mx-auto">
                    <li class="navbar-nav-item">
                        <a href="{{ route('Post.index') }}" class="nav-link font-weight-bold">Home</a>
                    </li>

                    <!-- Posts -->
                    <li class="navbar-nav-item font-weight-bold">
                        <a href="{{ route('Post.list') }}" class="nav-link">Posts</a>
                    </li>
                    <!-- End Posts -->

                    <!-- Create Category -->
                    <li class="navbar-nav-item font-weight-bold">
                        <a href="{{ route('Category.index') }}" class="nav-link">Categories</a>
                    </li>
                    <!-- End Create Category -->

                    <!-- Create Tag -->
                    <li class="navbar-nav-item font-weight-bold">
                        <a href="{{ route('Tag.index') }}" class="nav-link">Tags</a>
                    </li>
                    <!-- End Create Tag -->
                </ul>
                <!-- Begin Login, Register -->
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <div class="nav-item mr-3">
                                <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                    <a href="#" class="btn btn-danger"  onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                        Logout
                                    </a>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-dark ml-4 ">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <!-- End Login, Register -->
            </div>
            <!-- End Navigation -->
        </nav>
        <!-- End Nav -->
    </div>
</header>
<!-- ========== END HEADER ========== -->