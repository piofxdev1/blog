
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>Piofx Media</title>
		<meta name="description" content="Page with empty content" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		@include('components.themes.metronic7.blocks.styles')
		<link href="{{ asset('themes/metronic/css/pages/login/login-1.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="{{ asset('favicon_piofx.ico') }}" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
				<!--begin::Aside-->
				<div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #bcf0f750">
					<!--begin::Aside Top-->
					<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
						<!--begin::Aside header-->
						<div class="text-center mb-10">
							<img alt="Logo" src="{{ asset('piofx.png')}}" class="max-h-75px" />
						</div>
						<!--end::Aside header-->
						
					</div>
					<!--end::Aside Top-->
					<!--begin::Aside Bottom-->
					<div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url({{ asset('themes/metronic/media/svg/illustrations/login-visual-6.svg') }})"></div>
					<!--end::Aside Bottom-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
					<!--begin::Content body-->
					<div class="">
						<p>{{ $slot }}</p>
						
					</div>
					<!--end::Content body-->
					<!--begin::Content footer-->
					<div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
						<a href="#" class="text-primary font-weight-bolder font-size-h5">Terms</a>
						<a href="#" class="text-primary ml-10 font-weight-bolder font-size-h5">Plans</a>
						<a href="#" class="text-primary ml-10 font-weight-bolder font-size-h5">Contact Us</a>
					</div>
					<!--end::Content footer-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->

		@include('components.themes.metronic7.blocks.scripts')
	</body>
	<!--end::Body-->
</html>