@extends('structure.structure')
@section('store-active', 'active')
@section('title', __('Store'))
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStoreModal">
                Add Store
            </button>
            <div class="bg-secondary rounded p-4 mt-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Action</th>
                                <th scope="col"> Store Name</th>
                                <th scope="col">Location </th>
                                <th scope="col">Incharge </th>
                                <th scope="col">Phone </th>
                                <th scope="col">Statues </th>

                            </tr>
                        </thead>
                        <tbody id="tableaData">
                            @if (count($stores) > 0)
                                @foreach ($stores as $key => $store)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>
                                            <button class="btn btn-info editButton" data-id="{{ $store->store_id }}"
                                                data-bs-toggle="modal" data-bs-target="#editStoreModal">Edit</button>
                                            {{-- </td>
                                        <td> --}}
                                            <button class="btn btn-danger deleteButton" data-id="{{ $store->store_id }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteStoreModal">Delete</button>
                                        </td>
                                        <td>{{ $store->store_name }}</td>
                                        <td>{{ $store->store_location }}</td>
                                        <td>{{ $store->store_incharge }}</td>
                                        <td>{{ $store->store_phone }}</td>
                                        <td>{{ $store->store_status }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">Stock Item are not Found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                {{-- Add Item Modal  --}}
                <div class="modal" id="addStoreModal">
                    <div class="modal-dialog">
                        <form id="addStore">
                            @csrf
                            <div class="modal-content bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header bg-secondary">
                                    <h4 class="modal-title text-primary">Add Store </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="store_name" placeholder="Enter Your Store Name"
                                                class="w-100 form-control">
                                            <span class="error store_name_error"></span>
                                            <br><br>
                                            <input type="text" name="store_loc" placeholder="Enter store location"
                                                class="w-100 form-control">
                                            <span class="error store_loc_error"></span>
                                            <br><br>
                                            <input type="text" name="store_incharge" placeholder="Enter store incharge"
                                                class="w-100 form-control">
                                            <span class="error store_incharge_error"></span>
                                            <br><br>
                                            <input type="text" name="store_phone" placeholder="Enter store Phone Number"
                                                class="w-100 form-control">
                                            <span class="error store_phone_error"></span>
                                            <br><br>
                                            <select name="store_status" class="w-100 form-select">
                                                <option value="">Select store Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                            <span class="error store_status_error"></span>
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
                <div class="modal" id="editStoreModal">
                    <div class="modal-dialog">
                        <form id="editStore">
                            @csrf
                            <div class="modal-content bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header bg-secondary">
                                    <h4 class="modal-title text-primary">Edit Store</h4>
                                    <button type="button" class="btn-close  btn btn-primary"
                                        data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="edit_store_id" id="edit_store_id">
                                            <input type="text" name="edit_store_name" id="edit_store_name"
                                                placeholder="Enter Your Store Name" class="w-100 form-control">
                                            <span class="error store_name_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_store_loc" id="edit_store_loc"
                                                placeholder="Enter store location" class="w-100 form-control">
                                            <span class="error store_loc_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_store_incharge" id="edit_store_incharge"
                                                placeholder="Enter store incharge" class="w-100 form-control">
                                            <span class="error store_incharge_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_store_phone" id="edit_store_phone"
                                                placeholder="Enter store Phone Number" class="w-100 form-control">
                                            <span class="error store_phone_error"></span>
                                            <br><br>
                                            <select name="edit_store_status" id="edit_store_status"
                                                class="w-100 form-select">
                                                <option value="">Select store Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                            <span class="error store_status_error"></span>
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
                <div class="modal" id="deleteStoreModal">
                    <div class="modal-dialog">
                        <form id="deleteStore">
                            @csrf
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Store</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <p>Are you sure you want to delete Store?</p>
                                            <input type="hidden" name="store_id" id="store_id">
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
            //Add Store
            $("#addStore").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                // console.log(formData);
                $.ajax({
                    url: "{{ route('admin.addStores') }}",
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
            })
        });


        //  Edit Store

        var _token = $('input[name="_token"]').val();
        $('.editButton').click(function() {
            var store_id = $(this).attr('data-id');
            // console.log(supplier_id);
            $('#edit_store_id').val(store_id);
            $.ajax({
                url: "{{ route('admin.editStore') }}",
                type: 'POST',

                data: {
                    id: store_id,
                    _token: _token
                },
                success: function(res) {
                    console.log(res);
                    let edit_store_status = '<option>Select Item Type </option>';
                    if (res.success == true) {
                        // console.log(res.data.length);
                        for (let i = 0; i < res.data.length; i++) {
                            // console.log(res.data[i].sup_name);
                            $('#edit_store_name').val(res.data[i].store_name);
                            $('#edit_store_loc').val(res.data[i].store_location);
                            $('#edit_store_incharge').val(res.data[i].store_incharge);
                            $('#edit_store_phone').val(res.data[i].store_phone);
                            edit_store_status += '<option vlaue=' + res.data[i]['store_status'] + '>' +
                                res.data[i]['store_status'] + '</option>';
                            // }
                        }
                        $('#edit_store_status').append(edit_store_status);

                    }

                }
            })
        });

        //Update store
        $("#editStore").submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            console.log(formData);
            $.ajax({
                url: "{{ route('admin.updateStore') }}",
                type: "patch",
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


        // Delete Store
        $(".deleteButton").click(function() {
            var store_id = $(this).attr('data-id');
            // console.log(item_id);
            $("#store_id").val(store_id);
        });


        $("#deleteStore").submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            // console.log(formData);
            // alert('sedrfghj');
            $.ajax({
                url: "{{ route('admin.deleteStore') }}",
                method: "delete",
                data: formData,
                success: function(data) {
                    // alert('sedrfghj');
                    // console.log(data);
                    if (data.success == true) {
                        location.reload();
                    } else {
                        alert(data.msg);
                    }
                }
            });
        });
    </script>
@endpush
