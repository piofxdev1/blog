<!--begin::Header-->
<div id="kt_header" class="header flex-column header-fixed">
	<!--begin::Top-->
	<div class="header-top">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Left-->
			<div class="d-none d-lg-flex align-items-center mr-3">
				<!--begin::Logo-->
				<a href="index.html" class="mr-20">
					<img alt="Logo" src="{{ asset('piofx_white.png')}}" class="max-h-45px" />
				</a>
				<!--end::Logo-->
				<!--begin::Tab Navs(for desktop mode)-->
				<ul class="header-tabs nav  font-size-lg" role="tablist">
					<!--begin::Item-->
					<li class="nav-item">
						<a href="" class="nav-link py-4 px-6 " >Dashboard</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="nav-item mr-3">
						<a href="" class="nav-link py-4 px-6 " >Clients</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="nav-item mr-3">
						<a href="#" class="nav-link py-4 px-6" data-toggle="tab" data-target="#kt_header_tab_2" role="tab">Users</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="nav-item mr-3">
						<a href="#" class="nav-link py-4 px-6" data-toggle="tab" data-target="#kt_header_tab_2" role="tab">Pages</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="nav-item mr-3">
						<a href="#" class="nav-link py-4 px-6" data-toggle="tab" data-target="#kt_header_tab_2" role="tab">Blog</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="nav-item mr-3">
						<a href="#" class="nav-link py-4 px-6" data-toggle="tab" data-target="#kt_header_tab_2" role="tab">Settings</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="nav-item mr-3">
						<form method="POST" action="{{ route('logout') }}">
						@csrf
						<a href="#" class="nav-link py-4 px-6"  onclick="event.preventDefault();
                                                this.closest('form').submit();"
						>Logout</a>
						</form>
					</li>
					<!--end::Item-->
				</ul>
				<!--begin::Tab Navs-->
			</div>
			<!--end::Left-->
			<!--begin::Topbar-->
			<div class="topbar ">


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