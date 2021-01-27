<x-dynamic-component :component="$app->componentName">

    @if($stub == 'create')
        <form action="{{ route($app->module.'.store') }}" method="POST" enctype="multipart/form-data">
    @else
        <form action="{{ route($app->module.'.update', $obj->id) }}" method="POST" enctype="multipart/form-data">
    @endif
        <!-----begin second header------->
        <div class="col-lg-12 pt-3 d-flex justify-content-end align-items-center">
            <button type="submit" name="publish" value="save_as_draft" class="btn">Save As Draft</button>
            <button type="button" class="btn btn-outline-primary">Preview</button>
            <div class="ml-3">
                <div class="input-group date border border-primary rounded">
                    <input type="text" class="form-control" readonly="readonly" placeholder="Schedule"
                        id="kt_datepicker_3" style="background-color: #fff !important;" />
                    <div class="input-group-append">
                        <span class="input-group-text" style="background-color: #fff !important;">
                            <i class="la la-calendar"></i>
                        </span>
                    </div>
                </div>
            </div>
            @if($stub=='update')
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{ $obj->id }}">
            @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary ml-3" name="publish" value="now">Publish Now</button>
        </div>
        <!-----end second header--------->
        <!------------begin::Content------------->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Container-->
            <div class="container-fluid mt-3 mb-5">
                <!--begin::Dashboard-->
                <!--begin::Row-->
                <div class="row my-3">
                    <div class="col-xl-9 px-3">
                        <h3 class="ml-2 mb-3">
                            Create a Blog Post
                        </h3>
                        <input type="text" id="title" onkeyup="createSlug()"
                            class="form-control h-auto bg-light px-3 py-4 mb-2 border-0 rounded-lg font-size-h6"
                            name="title" placeholder="Title" value="@if($stub == 'update'){{$obj ? $obj->title : ''}}@endif"/>
                        <input type="text" id="slug"
                            class="form-control h-auto bg-light px-3 py-3 mb-3 border-0 rounded-lg font-size-h6"
                            name="slug" placeholder="Slug" value="@if($stub == 'update'){{$obj ? $obj->slug : ''}}@endif"/>
                        <input type="text"
                            class="form-control h-auto bg-light px-3 py-3 mb-3 border-0 rounded-lg font-size-h6"
                            name="excerpt" placeholder="Excerpt" value="@if($stub == 'update'){{$obj ? $obj->excerpt : ''}}@endif"/>
                        <textarea name="content" class="editor" id="editor">@if($stub == 'update'){{$obj ? $obj->content : ''}}@endif</textarea>
                        
                    </div>
                    <div class="col-xl-3">
                        <h3 class="mx-auto">Featured Image</h3>
                            <input type="text" hidden name="image" value="https://source.unsplash.com/random/1920x1080">
                            <!-- Dropzone -->
                            <div id="dropzoneExample1" class="js-dropzone dz-dropzone dz-dropzone-boxed gradient-overlay-half-primary-v4 my-3">
                            <div class="dz-message py-6">
                                <figure class="max-w-10rem mx-auto mb-3">
                                <img class="img-fluid" src="{{ asset('themes/front/svg/illustrations/drag-n-drop.svg') }}" alt="Image Description">
                                </figure>
                                <span class="d-block">Drag files here to upload</span>
                            </div>
                            </div>
                            <!-- End Dropzone -->
                        <div class="accordion bg-white" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button font-size-h3" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        Meta Data
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <!--begin::Form Group-->
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control h-auto bg-white border border-dark mb-2 p-3 rounded-md font-size-h6"
                                                name="meta_title" placeholder="Title" value="@if($stub == 'update'){{$obj ? $obj->meta_title : ''}}@endif"/>
                                            <input type="text"
                                                class="form-control h-auto bg-white border border-dark p-3 rounded-md font-size-h6"
                                                name="meta_description" placeholder="Description" value="@if($stub == 'update'){{$obj ? $obj->meta_description : ''}}@endif"/>
                                        </div>
                                        <!--end::Form Group-->
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed font-size-h3" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Categories
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <!-- Select -->
                                                    <select class="js-custom-select" data-hs-select2-options='{"placeholder": "Select Category"}' name="category_id">
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach                                                
                                                    </select>
                                                    <!-- End Select -->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed font-size-h3" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Tags
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <!------begin Tags------>
                                        <div class="mb-3">
                                            <!-- Select -->
                                            <select class="js-custom-select" multiple
                                                    data-hs-select2-options='{
                                                    "minimumResultsForSearch": "Infinity"
                                                    }' name="tag_ids[]">
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                            <!-- End Select -->
                                        </div>
                                        <!------end Tags-------->
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Base Table Widget 5-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->

        </div>
        <!--end::Content-->
    </form>
    <!--end::Main-->
</x-dynamic-component>
