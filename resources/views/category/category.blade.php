@extends('structure.structure')
@section('category-active','active')
@section('title', __('Category'))
@push('styles')
    <style>
        span {
            color: red;
        }
    </style>
@endpush

@section('main')
    <div class="row vh-100 bg-secondary rounded p-4 mx-0">

        <div class="col-12 text-center">
            <!-- Button trigger modal -->
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                Add Category
            </button>
            <div class="bg-secondary rounded p-4 mt-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                {{-- <th scope="col">Category Slug</th> --}}
                                <th scope="col">Category Status</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($categories) > 0)
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>{{ $category->cat_name }}</td>
                                        {{-- <td>{{ $category->cat_slug }}</td> --}}
                                        <td>{{ $category->cat_status }}</td>
                                        <td>
                                            <button class="btn btn-info editButton" data-id="{{ $category->cat_id }}"
                                                data-category="{{ $category->cat_name }}"
                                                data-status="{{ $category->cat_status }}"
                                                data-slug="{{ $category->cat_slug }}" data-bs-toggle="modal"
                                                data-bs-target="#editCategoryModal">Edit</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger deleteButton" data-id="{{ $category->cat_id }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">Categories are not Found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>


                <!-- Add Category Modal -->
                <div class="modal" id="addCategoryModal">
                    <div class="modal-dialog">
                        <form id="addCategory">
                            @csrf
                            <div class="modal-content  bg-secondary">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Category</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body  bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="cat_name" placeholder="Enter Category Name"
                                                class="w-100 form-control">
                                            <span class="error cat_name_error"></span>
                                            <br><br>
                                            <input type="text" name="cat_slug" placeholder="Enter Category Slug"
                                                class="w-100 form-control">
                                            <span class="error cat_slug_error"></span>
                                            <br><br>
                                            <select name="cat_status" class="w-100 form-control">
                                                <option value="">Select</option>
                                                <option value="active">active</option>
                                                <option value="inactive">inactive</option>
                                            </select>
                                            <span class="error cat_status_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer  bg-secondary">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <!-- Update Category Modal -->
                <div class="modal" id="editCategoryModal">
                    <div class="modal-dialog">
                        <form id="editCategory">
                            @csrf
                            <div class="modal-content  bg-secondary">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Category</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body  bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="cat_id" id="edit_cat_id">
                                            <input type="text" name="cat_name" id="category"
                                                placeholder="Enter Category Name" class="w-100 form-control">
                                            <span class="error cat_name_error"></span>
                                            <br><br>
                                            <input type="text" name="cat_slug" id="category_slug"
                                                placeholder="Enter Category Slug" class="w-100 form-control">
                                            <span class="error cat_slug_error"></span>
                                            <br><br>
                                            <select name="cat_status" class="w-100 form-control" id="category_status">
                                                <option value="">Select</option>
                                                <option value="active">active</option>
                                                <option value="inactive">inactive</option>
                                            </select>
                                            <span class="error cat_status_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer  bg-secondary">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <!-- Delete Category Modal -->
                <div class="modal" id="deleteCategoryModal">
                    <div class="modal-dialog">
                        <form id="deleteCategory">
                            @csrf
                            <div class="modal-content  bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Category</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body  bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <p>Are you sure you want to delete Category?</p>
                                            <input type="hidden" name="cat_id" id="delete_cat_id">
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer  bg-secondary">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            //Category Add
            $("#addCategory").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.addCategory') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        if (res.success == true) {
                            location.reload();
                        } else {
                            printErrorMsg(res);
                        }
                    }
                });
            });

            //Edit Category
            $(".editButton").click(function() {
                var category_id = $(this).attr('data-id');
                console.log(category_id);
                var category = $(this).attr('data-category');
                var category_slug = $(this).attr('data-slug');
                var category_status = $(this).attr('data-status');
                $("#edit_cat_id").val(category_id);
                $("#category").val(category);
                $("#category_slug").val(category_slug);
                $("#category_status").val(category_status);
            });

            $("#editCategory").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('admin.editCategory') }}",
                    dataType: "json",
                    method: "PUT",
                    data: formData,
                    success: function(data) {
                        if (data.success == true) {
                            location.reload();
                        } else {
                            printErrorMsg(data);
                        }
                    }
                });
            });

            //Delete Category
            $(".deleteButton").click(function() {
                var category_id = $(this).attr('data-id');
                $("#delete_cat_id").val(category_id);
            });

            $("#deleteCategory").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.deleteCategory') }}",
                    method: "DELETE",
                    data: formData,
                    success: function(data) {
                        //console.log(data);
                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });
            });

            function printErrorMsg(res) {
                $('.error').text("");
                $.each(res, function(key, value) {
                    $('.' + key + '_error').text(value);
                });
            }
        });
    </script>
@endpush
