@extends('structure.structure')
@section('modelno-active', 'active')
@section('title', __('Model'))
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModalNumber">
                Add Model Number
            </button>
            <div class="bg-secondary rounded p-4 mt-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Action</th>
                                <th scope="col">Model Name</th>
                                <th scope="col">Model Slug</th>
                                <th scope="col">Model Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($model) > 0)
                                @foreach ($model as $key => $models)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>
                                            <button class="btn btn-info editButton" data-id="{{ $models->mdl_id }}"
                                                 data-bs-toggle="modal"
                                                data-bs-target="#editModal">Edit</button>
                                            {{-- </td>
                                        <td> --}}
                                            <button class="btn btn-danger deleteButton" data-id="{{ $models->mdl_id }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                        </td>
                                        <td>{{ $models->mdl_name }}</td>
                                        <td>{{ $models->mdl_slug }}</td>
                                        <td>{{ $models->mdl_status }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">Brands are not Found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Add Brand Modal -->
                <div class="modal" id="addModalNumber">
                    <div class="modal-dialog">
                        <form id="addModel">
                            @csrf
                            <div class="modal-content  bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Model</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body  bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="model_name" placeholder="Enter Model Number"
                                                class="w-100 form-control">
                                            <span class="error model_name_error"></span>
                                            <br><br>
                                            <input type="text" name="model_slug" placeholder="Enter Model Slug"
                                                class="w-100 form-control">
                                            <span class="error model_slug_error"></span>
                                            <br><br>
                                            <select name="model_status" class="w-100 form-control">
                                                <option value="">Select</option>
                                                <option value="active">active</option>
                                                <option value="inactive">inactive</option>
                                            </select>
                                            <span class="error model_status_error"></span>
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

                <!-- Edit Model Modal -->
                <div class="modal" id="editModal">
                    <div class="modal-dialog">
                        <form id="editModelNo">
                            @csrf
                            <div class="modal-content  bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Brand</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body  bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="edit_model_id" id="edit_model_id">
                                            <input type="text" name="edit_model_name" placeholder="Enter Model Name"
                                                id="edit_model_name" class="w-100 form-control">
                                            <span class="error brand_name_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_model_slug" placeholder="Enter Model Slug"
                                                id="edit_model_slug" class="w-100 form-control">
                                            <span class="error brand_name_error"></span>
                                            <br><br>
                                            <select name="edit_model_status" class="w-100 form-control"
                                                id="edit_model_status">
                                                <option value="">Select</option>
                                                <option value="active">active</option>
                                                <option value="inactive">inactive</option>
                                            </select>
                                            <span class="error brand_status_error"></span>
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

                <!-- Delete Brand Modal -->
                <div class="modal" id="deleteModal">
                    <div class="modal-dialog">
                        <form id="deleteModels">
                            @csrf
                            <div class="modal-content  bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Model</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body  bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <p>Are you sure you want to delete brand?</p>
                                            <input type="hidden" name="delete_model_id" id="delete_model_id">
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
            //Model Add
            $("#addModel").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('admin.addModel') }}",
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


            //Edit model number
            var _token = $('input[name="_token"]').val();
            $('.editButton').click(function() {
                var modelno_id = $(this).attr('data-id');
                $('#edit_model_id').val(modelno_id);
                $.ajax({
                    url: "{{ route('admin.editModelno') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: modelno_id,
                        _token: _token
                    },
                    success: function(res) {
                        let editStatus = '<option>Select Status Type </option>';
                        if (res.success == true) {
                            // console.log(res.data.length);

                            for (let i = 0; i < res.data.length; i++) {
                                $('#edit_model_name').val(res.data[i].mdl_name);
                                $('#edit_model_slug').val(res.data[i].mdl_slug);
                                editStatus += '<option vlaue=' + res.data[i]['mdl_status'] +'>' + res.data[i]['mdl_status'] + '</option>';
                            }
                        }
                        $('#edit_model_status').append(editStatus);
                    }
                });
            });

            // update model number

            $("#editModelNo").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('admin.updateModelno') }}",
                    method: "PUT",
                    data: formData,
                    success: function(data) {
                        // console.log(data);
                        if (data.success == true) {
                            location.reload();
                        } else {
                            printErrorMsg(data);
                        }
                    }
                });
            });

            //Delete Brand
            $(".deleteButton").click(function() {
                var model_id = $(this).attr('data-id');
                $("#delete_model_id").val(model_id);
            });

            $("#deleteModels").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.deleteModels') }}",
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

            function printErrorMsg(data) {
                $('.error').text(" ");
                $.each(data, function(key, value) {
                    $('.' + key + '_error').text(value);
                });
            }
        });
    </script>
@endpush
