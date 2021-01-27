<x-dynamic-component :component="$app->componentName">
    <div class="container my-5">

        <!-- Actions -->
        <div class="d-flex justify-content-between align-ites-center my-3">
            <div>
                <!-- Breadcrumbs -->
            </div>
            <form action="{{ route($app->module.'.create') }}">
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Record</button>
            </form>
        </div>
        <!-- End Actions -->

        <!-- Table -->
        <table class="table shadow-sm border">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="p-3">#</th>
                    <th scope="col" class="p-3">Name</th>
                    <th scope="col" class="p-3">Slug</th>
                    <th scope="col" class="p-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($objs as $obj)
                <tr>
                    <th scope="row" class="px-3 align-middle">{{ $obj->id }}</th>
                    <td class="px-3 align-middle">{{ $obj->name }}</td>
                    <td class="px-3 align-middle">{{ $obj->slug }}</td>
                    <td class="px-3 align-middle">
                        <div class="d-flex justify-content-center align-items-center">

                            <!-- Edit Button -->
                            <form action="{{ route($app->module.'.edit', $obj->slug) }}">
                                <button type="submit" class="btn mr-2"><i class="fas fa-edit text-info m-0"></i></button>
                            </form>
                            <!-- End Edit Button -->

                            <!-- Confirm Delete Modal Trigger -->
                            <i class="fas fa-trash-alt text-danger m-0" type="button" data-toggle="modal" data-target="#staticBackdrop-{{$obj->id}}"></i>
                            <!-- End Confirm Delete Modal Trigger -->

                            <!-- Confirm Delete Modal -->
                            <div class="modal fade" id="staticBackdrop-{{$obj->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Confirm Delete</h5>
                                        <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal" aria-label="Close">
                                        <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                                        </svg>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete this permanently?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                        <form action="{{ route($app->module.'.destroy', $obj->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Confirm Delete Modal -->
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- End Table -->
    </div>
</x-dynamic-component>