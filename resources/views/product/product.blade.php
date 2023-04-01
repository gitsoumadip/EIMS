@extends('structure.structure')
@section('product-active', 'active')
@section('title', __('Product'))
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                Add Product
            </button>
            <div class="bg-secondary rounded p-4 mt-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th  scope="col">Action</th>
                                <th scope="col"> Name</th>
                                <th scope="col">desc</th>
                                <th scope="col"> Status</th>
                            </tr>
                        </thead>
                        <tbody id="tableaData">
                            @if (count($products) > 0)
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>
                                            <button class="btn btn-info editButton" data-id="{{ $product->product_id }}"
                                                data-bs-toggle="modal" data-bs-target="#editProductModal">Edit</button>
                                        {{-- </td>
                                        <td> --}}
                                            <button class="btn btn-danger deleteButton" data-id="{{ $product->product_id }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteProductModal">Delete</button>
                                        </td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_desc }}</td>
                                        <td>{{ $product->product_status }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">Items are not Found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                {{-- Add Product Modal  --}}
                <div class="modal" id="addProductModal">
                    <div class="modal-dialog">
                        <form id="addProduct">
                            @csrf
                            <div class="modal-content bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header bg-secondary">
                                    <h4 class="modal-title text-primary">Add Product</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="product_name" placeholder="Enter product Name"
                                                class="w-100 form-control">
                                            <span class="error product_name_error"></span>
                                            <br><br>
                                            <input type="text" name="product_desc" placeholder="Enter product desc"
                                                class="w-100 form-control">
                                            <span class="error product_desc_error"></span>
                                            <br><br>
                                            <select name="product_status" class="w-100 form-select">
                                                <option value="">Select</option>
                                                <option value="available">available</option>
                                                <option value="unavailable">unavailable</option>
                                                {{-- <option value="damage">damage</option> --}}
                                            </select>
                                            <span class="error product_status_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer bg-secondary">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Edit Product Modal -->
                <div class="modal" id="editProductModal">
                    <div class="modal-dialog">
                        <form id="editProduct">
                            @csrf
                            <div class="modal-content bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header bg-secondary">
                                    <h4 class="modal-title text-primary">Edit Product</h4>
                                    <button type="button" class="btn-close  btn btn-primary"
                                        data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="edit_product_id" id="edit_product_id">
                                            <input type="text" name="edit_product_name" placeholder="Enter product Name"
                                                id="edit_product_name" class="w-100">
                                            <span class="error product_name_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_product_desc" id="edit_product_desc"
                                                placeholder="Enter product desc" class="w-100 form-control">
                                            <span class="error product_desc_error"></span>
                                            <br><br>
                                            <select name="edit_product_status" id="edit_product_status"
                                                class="w-100 form-select">
                                                <option value="available">available</option>
                                                <option value="unavailable">unavailable</option>
                                                <option value="damage">damage</option>
                                            </select>
                                            <span class="error Product_status_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer bg-secondary">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Delete Product Modal -->
                <div class="modal" id="deleteProductModal">
                    <div class="modal-dialog">
                        <form id="deleteProductData">
                            @csrf
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Product</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <p>Are you sure you want to delete Product?</p>
                                            <input type="hidden" name="product_id" id="delete_Product_id">
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
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
            //Add Product
            $("#addProduct").submit(function(e) {

                e.preventDefault();
                var formData = $(this).serialize();
                // console.log(formData);
                $.ajax({
                    url: "{{ route('admin.addProduct') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        if (res.success == true) {
                            //  console.log("success",res);
                            location.reload();
                        } else {
                            //printErrorMsg(res);
                            alert("error", res.msg);
                        }
                    }
                });
            })

            //Edit Product
            var _token = $('input[name="_token"]').val();
            $('.editButton').click(function() {
                var product_id = $(this).attr('data-id');
                console.log(product_id);
                $('#edit_product_id').val(product_id);
                $.ajax({
                    url: "{{ route('admin.editProduct') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: product_id,
                        _token: _token
                    },
                    success: function(res) {
                        let editStatus = '<option>Select product Type </option>';
                        if (res.success == true) {
                            // console.log(res.data.length);

                            for (let i = 0; i < res.data.length; i++) {
                                $('#edit_product_name').val(res.data[i].product_name);
                                $('#edit_product_desc').val(res.data[i].product_desc);
                                editStatus += '<option vlaue=' + res.data[i]['product_status'] +
                                    '>' + res.data[i]['product_status'] + '</option>';
                            }
                        }
                        $('#edit_product_status').append(editStatus);
                    }
                });
            });
                //update product
            $("#editProduct").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('admin.updateProduct') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        // console.log(res);
                        if (res.success == true) {
                            // console.log("success", res);
                            location.reload();
                        } else {
                            //printErrorMsg(res);
                            alert("error", res.msg);
                        }
                    }
                });
            });

            // Delete
            $(".deleteButton").click(function() {
                var product_id = $(this).attr('data-id');
                // console.log(product_id);
                $("#delete_product_id").val(product_id);
            });

            $("#deleteproductData").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('admin.deleteProduct') }}",
                    method: "DELETE",
                    data: formData,
                    success: function(data) {
                        console.log(data);
                        // if (data.success == true) {
                        //     location.reload();
                        // } else {
                        //     alert(data.msg);
                        // }
                    }
                });
            });
        });
    </script>
@endpush
