@extends('structure.structure')
@section('brand-active', 'active')
@section('title', __('Brand'))
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBrandModal">
                Add Brand
            </button>
            <div class="bg-secondary rounded p-4 mt-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Status</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($brands) > 0)
                                @foreach ($brands as $key => $brand)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>{{ $brand->brand_status }}</td>
                                        <td>
                                            <button class="btn btn-info editButton" data-id="{{ $brand->brand_id }}"
                                                data-brand-name="{{ $brand->brand_name }}"
                                                data-brand-status="{{ $brand->brand_status }}" data-bs-toggle="modal"
                                                data-bs-target="#editBrandModal">Edit</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger deleteButton" data-id="{{ $brand->brand_id }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteBrandModal">Delete</button>
                                        </td>
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
                <div class="modal" id="addBrandModal">
                    <div class="modal-dialog">
                        <form id="addBrand">
                            @csrf
                            <div class="modal-content  bg-secondary  ">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Brand</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body  bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="brand_name" placeholder="Enter Brand Name"
                                                class="w-100 form-control">
                                            <span class="error brand_name_error"></span>
                                            <br><br>
                                            <select name="brand_status" class="w-100 form-control">
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
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Edit Brand Modal -->
                <div class="modal" id="editBrandModal">
                    <div class="modal-dialog">
                        <form id="editBrand">
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
                                            <input type="hidden" name="brand_id" id="edit_brand_id">
                                            <input type="text" name="brand_name" placeholder="Enter Brand Name"
                                                id="edit_brand_name" class="w-100 form-control">
                                            <span class="error brand_name_error"></span>
                                            <br><br>
                                            <select name="brand_status" class="w-100 form-control" id="edit_brand_status">
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
                <div class="modal" id="deleteBrandModal">
                    <div class="modal-dialog">
                        <form id="deleteBrand">
                            @csrf
                            <div class="modal-content  bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Brand</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body  bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <p>Are you sure you want to delete brand?</p>
                                            <input type="hidden" name="brand_id" id="delete_brand_id">
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
            //Brand Add
            $("#addBrand").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.addBrand') }}",
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

            //Edit Brand
            $(".editButton").click(function() {
                var brand_id = $(this).attr('data-id');
                var brand_name = $(this).attr('data-brand-name');
                var brand_status = $(this).attr('data-brand-status');
                $("#edit_brand_id").val(brand_id);
                $("#edit_brand_name").val(brand_name);
                $("#edit_brand_status").val(brand_status);
            });

            $("#editBrand").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('admin.editBrand') }}",
                    method: "PUT",
                    data: formData,
                    success: function(data) {
                        console.log(data);
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
                var brand_id = $(this).attr('data-id');
                $("#delete_brand_id").val(brand_id);
            });

            $("#deleteBrand").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.deleteBrand') }}",
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
                $('.error').text("");
                $.each(data, function(key, value) {
                    $('.' + key + '_error').text(value);
                });
            }
        });
    </script>
@endpush
