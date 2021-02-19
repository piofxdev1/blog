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
                <div class="input-group date">
                    <input type="text" class="form-control bg-white" readonly="readonly" placeholder="Schedule" id="kt_datetimepicker_2" />
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar-check-o glyphicon-th"></i>
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
                            class="form-control h-auto border-0 shadow-sm px-3 py-4 mb-2 font-size-h6"
                            name="title" placeholder="Title" value="@if($stub == 'update'){{$obj ? $obj->title : ''}}@endif"/>
                        <input type="text" id="slug"
                            class="form-control h-auto border-0 shadow-sm px-3 py-3 mb-3 font-size-h6"
                            name="slug" placeholder="Slug" value="@if($stub == 'update'){{$obj ? $obj->slug : ''}}@endif"/>
                        <input type="text"
                            class="form-control h-auto border-0 shadow-sm px-3 py-3 mb-3 font-size-h6"
                            name="excerpt" placeholder="Excerpt" value="@if($stub == 'update'){{$obj ? $obj->excerpt : ''}}@endif"/>
                        <textarea name="content" class="editor" id="editor">@if($stub == 'update'){{$obj ? $obj->content : ''}}@endif</textarea>
                        
                    </div>
                    <!-- Right Column -->
                    <div class="col-xl-3">
                        <div class="p-3 bg-white rounded shadow-sm my-3">
                            <h3 class="d-flex align-items-center"><i class="far fa-image mr-3 text-primary"></i>Featured Image</h3>
                            <input type="text" hidden name="image" value="https://source.unsplash.com/random/1920x1080">
                            <!-- Dropzone -->
                                <div class="dropzone dropzone-default dropzone-primary my-3" id="kt_dropzone_1">
                                    <div class="dropzone-msg dz-message needsclick">
                                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                    </div>
                                </div>
                            <!-- End Dropzone -->
                        </div>
                        

                        <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                            <div class="card">
                                <div class="card-header" id="headingOne6">
                                    <div class="card-title bg-white" data-toggle="collapse" data-target="#collapseOne1">
                                        <i class="fas fa-cookie"></i> Meta Data
                                    </div>
                                </div>
                                <div id="collapseOne1" class="collapse show" data-parent="#accordionExample6">
                                    <div class="card-body">
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
                            <div class="card">
                                <div class="card-header" id="headingOne6">
                                    <div class="card-title collapsed bg-white" data-toggle="collapse" data-target="#collapseOne2">
                                        <i class="fas fa-stream"></i> Categories
                                    </div>
                                </div>
                                <div id="collapseOne2" class="collapse show" data-parent="#accordionExample6">
                                    <div class="card-body">
                                        <select class="form-control select2" id="kt_select2_1" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" selected ="@if($stub == 'update') $obj->category_id == $category->id ? {{ 'selected' }} : '' @endif">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingOne6">
                                    <div class="card-title collapsed bg-white" data-toggle="collapse" data-target="#collapseOne3">
                                        <i class="fas fa-tags"></i> Tags
                                    </div>
                                </div>
                                <div id="collapseOne3" class="collapse" data-parent="#accordionExample6">
                                    <div class="card-body">
                                        <!------begin Tags------>
                                            <select class="form-control select2" id="kt_select2_11" name="tag_ids[]" multiple="multiple">
                                                @if($stub != "update")
                                                    <option selected="selected">Select Tags</option>
                                                @endif

                                                @php
                                                    $tag_ids = [];
                                                    foreach($obj->tags as $tag){
                                                        array_push($tag_ids, $tag->id);
                                                    }
                                                @endphp

                                                @foreach($tags as $tag)
                                                        <option value="{{ $tag->id }}" @if($stub == 'update') in_array($tag->id, $tag_ids) ? {{ "selected" }} : '' @endif>{{ $tag->name }}</option>
                                                @endforeach
                            
                                            </select>
                                        <!------end Tags-------->
                                    </div>
                                </div>
                            </div>
                        </div>


                       
                    </div>
                    <!-- end::Right Column -->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->

        </div>
        <!--end::Content-->
    </form>
    <!--end::Main-->
</x-dynamic-component>
