<!--begin::Header-->
<div id="kt_header" class="header flex-column header-fixed">
	<!--begin::Top-->
	<div class="header-top">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Left-->
			<div class="d-flex align-items-center">
				<!--begin::Logo-->
					<a href="{{ route('Post.index') }}" class="mr-20">
						<img alt="Logo" src="{{ asset('img/logos/piofx-white.png')}}" class="max-h-45px" />
					</a>
				<!--end::Logo-->
				<!--begin::Tab Navs(for desktop mode)-->
				<div class="col-9 d-flex justify-content-center align-items-center">
					<a href="{{ route('Post.index') }}" class="nav-link text-decoration-none text-white">Home</a>
					<a href="{{ route('Post.list') }}" class="nav-link text-decoration-none text-white">Posts</a>
					<a href="{{ route('Category.index') }}" class="nav-link text-decoration-none text-white">Categories</a>
					<a href="{{ route('Tag.index') }}" class="nav-link text-decoration-none text-white">Tags</a>
				</div>

				<!--begin::Tab Navs-->
			</div>
			<!--end::Left-->
			<!--begin::Topbar-->
			<div class="topbar">
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
				<!--begin::User-->
				<div class="topbar-item">
					<div class="btn btn-icon btn-hover-transparent-white w-auto d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
						<div class="d-flex flex-column text-right pr-3">
							<span class="text-white opacity-50 font-weight-bold font-size-sm d-none d-md-inline">Sean</span>
							<span class="text-white font-weight-bolder font-size-sm d-none d-md-inline">UX Designer</span>
						</div>
						<span class="symbol symbol-35">
							<span class="symbol-label font-size-h5 font-weight-bold text-white bg-white-o-30">S</span>
						</span>
					</div>
				</div>
				<!--end::User-->
			</div>
			<!--end::Topbar-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Top-->

</div>
<!--end::Header-->