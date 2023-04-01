@extends('structure.structure')
@section('item-active', 'active')
@section('title', __('Item'))
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItemModal">
                Add Item
            </button>
            <div class="bg-secondary rounded p-4 mt-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Action</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Brand Name </th>
                                <th scope="col">Category Name </th>
                                <th scope="col">Store Loc </th>
                                <th scope="col">Model No. </th>
                                <th scope="col">Serial No. </th>
                                <th scope="col">Aprox Price </th>
                                <th scope="col">Desc </th>
                                <th scope="col">Statues </th>
                            </tr>
                        </thead>
                        <tbody id="tableaData">
                            {{-- {{$items}} --}}
                            {{-- {{$categorys}} --}}
                            @if (count($items) > 0)
                                @foreach ($items as $key => $item)
                                    <tr>
                                        {{-- {{$item}} --}}
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>
                                            <button class="btn btn-info editButton" data-id="{{ $item->item_id }}"
                                                data-bs-toggle="modal" data-bs-target="#edititemModal">Edit</button>
                                            {{-- </td>
                                        <td> --}}
                                            <button class="btn btn-danger deleteButton" data-id="{{ $item->item_id }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteitemModal">Delete</button>
                                        </td>
                                        <td>{{ $item->products[0]['product_name'] }}</td>
                                        <td>{{ $item->brands[0]['brand_name'] }}</td>
                                        <td>{{ $item->categories[0]['cat_name'] }}</td>
                                        <td>{{ $item->storeloc[0]['store_name'] }}</td>
                                        <td>{{ $item->modelNo[0]['mdl_name'] }}</td>
                                        <td>{{ $item->item_sl_no }}</td>
                                        <td>{{ $item->item_approx_price }}</td>
                                        <td>{{ $item->item_desc }}</td>
                                        <td>{{ $item->item_status }}</td>


                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">item Item are not Found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>



                {{-- Add Item Modal  --}}
                <div class="modal" id="addItemModal">
                    <div class="modal-dialog">
                        <form id="addItem">
                            @csrf
                            <div class="modal-content bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header bg-secondary">
                                    <h4 class="modal-title text-primary">Add Item</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <select name="item_name" class="w-100 form-select">
                                                <option value="">Select Item</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->product_id }}">
                                                        {{ $product->product_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error item_name_error"></span>
                                            <br><br>
                                            <select name="item_category" class="w-100 form-select">
                                                <option value="">Select Category</option>
                                                @foreach ($categorys as $cat)
                                                    <option value="{{ $cat->cat_id }}">{{ $cat->cat_name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="error item_category_error"></span>
                                            <br><br>
                                            <select name="item_brand" class="w-100 form-select">
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error item_brand_error"></span>
                                            <br><br>
                                            <select name="item_store_loc" class="w-100 form-select">
                                                <option value="">Select store_loc</option>
                                                @foreach ($storeloc as $strloc)
                                                    <option value="{{ $strloc->store_id }}">{{ $strloc->store_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error item_store_loc_error"></span>
                                            <br><br>
                                            <select name="item_model_no" class="w-100 form-select">
                                                <option value="">Select Model No</option>
                                                @foreach ($modelNumber as $modelNumbers)
                                                    <option value="{{ $modelNumbers->mdl_id }}">
                                                        {{ $modelNumbers->mdl_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error item_brand_error"></span>
                                            <br><br>
                                            <input type="text" name="item_serial_no" placeholder="Enter Serial No."
                                                class="w-100 form-control">
                                            <span class="error item_serial_error"></span>
                                            <br><br>
                                            <input type="text" name="item_approx_rate" placeholder="Enter Approx Rate"
                                                class="w-100 form-control">
                                            <span class="error item_model_error"></span>
                                            <br><br>
                                            <input type="text" name="item_desc" placeholder="Enter Desc"
                                                class="w-100 form-control">
                                            <span class="error item_desc_error"></span>
                                            <br><br>
                                            <select name="item_status" class="w-100 form-select">
                                                <option value="">Select item status</option>
                                                <option value="available">available</option>
                                                <option value="unavailable">unavailable</option>
                                                <option value="damage">damage</option>
                                            </select>
                                            <span class="error supplier_status_error"></span>
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

                <!-- Edit Item Modal -->
                <div class="modal" id="edititemModal">
                    <div class="modal-dialog">
                        <form id="editItem">
                            @csrf
                            <div class="modal-content bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header bg-secondary">
                                    <h4 class="modal-title text-primary">Edit Item</h4>
                                    <button type="button" class="btn-close  btn btn-primary"
                                        data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="edit_item_id" id="edit_item_id">
                                            <select name="edit_item_name" id="edit_item_name" class="w-100 form-select">
                                                <option value="">Select Item</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->product_id }}">
                                                        {{ $product->product_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error item_name_error"></span>
                                            <br><br>
                                            <select name="edit_item_category" id="edit_item_category"
                                                class="w-100 form-select">
                                                <option value="">Select Category</option>
                                                @foreach ($categorys as $cat)
                                                    <option value="{{ $cat->cat_id }}">{{ $cat->cat_name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="error item_category_error"></span>
                                            <br><br>
                                            <select name="edit_item_brand" id="edit_item_brand"
                                                class="w-100 form-select">
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error item_brand_error"></span>
                                            <br><br>
                                            <select name="edit_item_store_loc" id="edit_item_store_loc"
                                                class="w-100 form-select">
                                                <option value="">Select store_loc</option>
                                                @foreach ($storeloc as $strloc)
                                                    <option value="{{ $strloc->store_id }}">{{ $strloc->store_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error item_store_loc_error"></span>
                                            <br><br>
                                            <select name="edit_item_model_no" id="edit_item_model_no"
                                                class="w-100 form-select">
                                                <option value="">Select Model No</option>
                                                @foreach ($modelNumber as $modelNumbers)
                                                    <option value="{{ $modelNumbers->mdl_id }}">
                                                        {{ $modelNumbers->mdl_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="error item_brand_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_item_serial_no" id="edit_item_serial_no"
                                                placeholder="Enter Serial No." class="w-100 form-control">
                                            <span class="error item_serial_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_item_approx_rate" id="edit_item_approx_rate"
                                                placeholder="Enter Approx Rate" class="w-100 form-control">
                                            <span class="error item_model_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_item_desc" id="edit_item_desc"
                                                placeholder="Enter Desc" class="w-100 form-control">
                                            <span class="error item_desc_error"></span>
                                            <br><br>
                                            <select name="edit_item_status" id="edit_item_status"
                                                class="w-100 form-select">
                                                <option value="">Select item status</option>
                                                <option value="available">available</option>
                                                <option value="unavailable">unavailable</option>
                                                <option value="damage">damage</option>
                                            </select>
                                            <span class="error supplier_status_error"></span>
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

                <!-- Delete Item Modal -->
                <div class="modal" id="deleteitemModal">
                    <div class="modal-dialog">
                        <form id="deleteItem">
                            @csrf
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Item</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <p>Are you sure you want to delete Supplier?</p>
                                            <input type="hidden" name="delete_item_id" id="delete_item_id">
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
            //Add Item
            $("#addItem").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('admin.addItem') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
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

            //Edit item
            var _token = $('input[name="_token"]').val();
            $('.editButton').click(function() {
                var item_id = $(this).attr('data-id');
                console.log(item_id);
                $('#edit_item_id').val(item_id);
                $.ajax({
                    url: "{{ route('admin.editItem') }}",
                    type: 'POST',
                    data: {
                        id: item_id,
                        _token: _token
                    },
                    success: function(res) {
                        console.log(res);
                        let item_name = '<option>Select item Type </option>';
                        let item_category = '<option>Select item Type </option>';
                        let item_brand = '<option>Select item Type </option>';
                        let item_modelno = '<option>Select item Type </option>';
                        let item_store_loc = '<option>Select item Type </option>';
                        let store_status = '<option>Select item Type </option>';

                        if (res.success == true) {
                            console.log(res.data);
                            console.log(res.data.item);

                            for (let i = 0; i < res.data.item.length; i++) {
                                console.log(res.data.item[i].products[i]);
                                $('#edit_item_serial_no').val(res.data.item[i].item_sl_no);
                                $('#edit_item_approx_rate').val(res.data.item[i]
                                    .item_approx_price);
                                $('#edit_item_desc').val(res.data.item[i].item_desc);


                                //item item_name
                                item_name += '<option vlaue=' + res.data.item[i].products[i].
                                product_id + '>' +
                                    res.data.item[i].products[i].product_name + '</option>';

                                // item item_category
                                item_category += '<option vlaue=' + res.data.item[i].categories[
                                        i].cat_id + '>' +
                                    res.data.item[i].categories[i].cat_name + '</option>';

                                //item item_brand
                                item_brand += '<option vlaue=' + res.data.item[i].brands[i]
                                    .brand_id + '>' +
                                    res.data.item[i].brands[i].brand_name + '</option>';

                                //item item_modelno
                                item_modelno += '<option vlaue=' + res.data.item[i].model_no[i]
                                    .id + '>' +
                                    res.data.item[i].model_no[i].store_name + '</option>';

                                //item item_store_loc
                                item_store_loc += '<option vlaue=' + res.data.item[i].storeloc[
                                        i].id + '>' +
                                    res.data.item[i].storeloc[i].store_name + '</option>';

                                //item store_status
                                store_status += '<option vlaue=' + res.data.item[i]
                                    .item_status + '>' +
                                    res.data.item[i].item_status + '</option>';
                            }
                        }

                        $('#edit_item_name').append(item_name);
                        $('#edit_item_category').append(item_category);
                        $('#edit_item_brand').append(item_brand);
                        $('#edit_item_model_no').append(item_modelno);
                        $('#edit_item_store_loc').append(item_store_loc);
                        $('#edit_item_status').append(store_status);
                    }
                });
            });

            // Update Item

            $('#editItem').submit(function(e) {
                e.preventDefault();
                var fromData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.updateItem') }}",
                    type: 'post',
                    data: fromData,
                    success: function(res) {
                        // console.log(res);
                        if (res.success == true) {
                            // console.log(res);
                            location.reload();
                        } else {
                            alert('error msg');
                        }
                    }
                });
            });

            // Delete
            $(".deleteButton").click(function() {
                var item_id = $(this).attr('data-id');
                // console.log(item_id);
                $("#delete_item_id").val(item_id);
            });

            $('#deleteItem').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                // console.log(formData);
                $.ajax({
                    url: "{{ route('admin.deleteItem') }}",
                    type: 'delete',
                    data: formData,
                    success: function(res) {
                        // console.log(res);
                        if (res.success == true) {
                            // console.log(res);
                            location.reload();
                        } else {
                            alert('error msg');
                        }
                    }
                });
            });
        });
    </script>
@endpush
