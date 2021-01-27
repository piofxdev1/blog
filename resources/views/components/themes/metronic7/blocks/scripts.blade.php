<!--begin::Global Config(lobal config for global J scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff" "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('themes/metronic/plugins/global/plugins.bundle.js?v=7.0.5')}}"></script>
<script src="{{ asset('themes/metronic/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5')}}"></script>
<script src="{{ asset('themes/metronic/js/scripts.bundle.js?v=7.0.5')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('themes/metronic/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.5') }}"></script>
<!-- <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM?v=7.0.5"></script> -->
<script src="{{ asset('themes/metronic/plugins/custom/gmaps/gmaps.js?v=7.0.5')}}"></script>
<script src="{{ asset('themes/metroni/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.5') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('themes/metronic/js/pages/widgets.js?v=7.0.5')}}"></script>
<!--end::Page Scripts-->

<script>
    // TinyMCE - WYSIWYG
    tinymce.init({
        selector: '.editor',
        min_height: 500,
        plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help'
        ],
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help',
        menu: {
        favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help',
        statusbar: false,
        images_upload_url: "upload_image",
    });
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<script>
    console.log("hello");
</script>