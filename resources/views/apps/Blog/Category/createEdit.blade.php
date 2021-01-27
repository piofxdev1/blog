<x-dynamic-component :component="$app->componentName">
  <div class="container my-5 p-3 bg-light shadow-sm">
    @if($stub == "create")
    <form method="POST" action="{{ route($app->module.'.store') }}">
    @else
    <form method="POST" action="{{ route($app->module.'.update', $obj->id) }}">
    @endif
      @csrf
      <h3 class="text-center font-weight-bold py-2">Create a Category</h3>
      <div class="my-3">
        <h5>Name:</h5>
        <input class="form-control" name="name" id="title" onkeyup="createSlug()" type="text" value="@if($stub == 'update'){{ $obj ? $obj->name : '' }}@endif">
        <h5 class="mt-3">Slug:</h5>
        <input class="form-control" name="slug" id="slug" type="text" value="@if($stub == 'update'){{ $obj ? $obj->slug : '' }}@endif">
        <h5 class="mt-3">Description:</h5> 
        <input class="form-control" type="text" name="description" value="@if($stub == 'update'){{ $obj ? $obj->description : '' }}@endif">
        <!-- Dropzone -->
        <input type="text" hidden name="image" value="https://source.unsplash.com/random/1920x1080">
        <div id="dropzoneExample1" class="js-dropzone dz-dropzone dz-dropzone-boxed gradient-overlay-half-primary-v4 my-3">
          <div class="dz-message py-6">
            <figure class="max-w-10rem mx-auto mb-3">
              <img class="img-fluid" src="{{ asset('themes/front/svg/illustrations/drag-n-drop.svg') }}" alt="Image Description">
            </figure>
            <span class="d-block">Drag files here to upload</span>
          </div>
        </div>
        <!-- End Dropzone -->
        @if($stub=='update')
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{ $obj->id }}">
        @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary mt-3">Create</button>
      </div>
    </form>
  </div>
</x-dynamic-component>