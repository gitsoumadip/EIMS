@extends('structure.structure')
@section('suppler-active', 'active')
@section('title', __('Suppler'))
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSupplierModal">
                Add Supplier
            </button>
            <div class="bg-secondary rounded p-4 mt-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> Name</th>
                                <th scope="col">Company Name </th>
                                <th scope="col">Office Address </th>
                                <th scope="col">Phone </th>
                                <th scope="col">Office Phone </th>
                                <th scope="col">Email  </th>
                                <th scope="col">Statues </th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="tableaData">
                            @if (count($supplier) > 0)
                                @foreach ($supplier as $key => $suppliers)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>{{ $suppliers->sup_name }}</td>
                                        <td>{{ $suppliers->sup_company_name }}</td>
                                        <td>{{ $suppliers->sup_office_address }}</td>
                                        <td>{{ $suppliers->sup_mob_no }}</td>
                                        <td>{{ $suppliers->sup_comp_mob_no }}</td>
                                        <td>{{ $suppliers->sup_email }}</td>
                                        <td>{{ $suppliers->sup_status }}</td>
                                        {{-- <td>{{ $suppliers->sup_id }}</td> --}}
                                        <td>
                                            <button class="btn btn-info editButton" data-id="{{ $suppliers->sup_id }}"
                                                data-supplier-name="{{ $suppliers->sup_name }}"
                                                data-supplier-status="{{ $suppliers->sup_status }}" data-bs-toggle="modal"
                                                data-bs-target="#editSupplierModal">Edit</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger deleteButton" data-id="{{ $suppliers->sup_id }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteSupplierModal">Delete</button>
                                        </td>
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

                {{-- Add Item Modal  --}}
                <div class="modal" id="addSupplierModal">
                    <div class="modal-dialog">
                        <form id="addSupplier">
                            @csrf
                            <div class="modal-content bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header bg-secondary">
                                    <h4 class="modal-title text-primary">Add Supplier</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="supplier_name"
                                                placeholder="Enter edit supplier Name" class="w-100 form-control">
                                            <span class="error supplier_name_error"></span>
                                            <br><br>
                                            <input type="text" name="supplier_company_name"
                                                placeholder="Enter supplier Company Name" class="w-100 form-control">
                                            <span class="error supplier_company_name_error"></span>
                                            <br><br>
                                            <input type="text" name="supplier_address"
                                                placeholder="Enter supplier Address" class="w-100 form-control">
                                            <span class="error supplier_address_error"></span>
                                            <br><br>
                                            <input type="text" name="supplier_phone"
                                                placeholder="Enter supplier Phone Number" class="w-100 form-control">
                                            <span class="error supplier_phone_error"></span>
                                            <br><br>
                                            <input type="text" name="supplier_comp_phone"
                                                placeholder="Enter supplier Company Phone Number"
                                                class="w-100 form-control">
                                            <span class="error supplier_comp_phone_error"></span>
                                            <br><br>
                                            <input type="text" name="supplier_email" placeholder="Enter supplier Email"
                                                class="w-100 form-control">
                                            <span class="error supplier_email_error"></span>
                                            <br><br>
                                            <select name="supplier_status" class="w-100 form-select">
                                                <option value="">Select supplier Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
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
                <div class="modal" id="editSupplierModal">
                    <div class="modal-dialog">
                        <form id="editSupplier">
                            @csrf
                            <div class="modal-content bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header bg-secondary">
                                    <h4 class="modal-title text-primary">Edit Supplier</h4>
                                    <button type="button" class="btn-close  btn btn-primary"
                                        data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="edit_supplier_id" id="edit_supplier_id">
                                            <input type="text" name="edit_supplier_name" id="edit_supplier_name"
                                                placeholder="Enter supplier Name" class="w-100 form-control">
                                            <span class="error supplier_name_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_supplier_company_name"
                                                id="edit_supplier_company_name" placeholder="Enter supplier Company Name"
                                                class="w-100 form-control">
                                            <span class="error supplier_company_name_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_supplier_address" id="edit_supplier_address"
                                                placeholder="Enter supplier Address" class="w-100 form-control">
                                            <span class="error supplier_address_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_supplier_phone" id="edit_supplier_phone"
                                                placeholder="Enter supplier Phone Number" class="w-100 form-control">
                                            <span class="error supplier_phone_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_supplier_comp_phone"
                                                id="edit_supplier_comp_phone"
                                                placeholder="Enter supplier Company Phone Number"
                                                class="w-100 form-control">
                                            <span class="error supplier_comp_phone_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_supplier_email" id="edit_supplier_email"
                                                placeholder="Enter supplier Email" class="w-100 form-control">
                                            <span class="error supplier_email_error"></span>
                                            <br><br>
                                            <select name="edit_supplier_status" id="edit_supplier_status"
                                                class="w-100 form-select">
                                                <option value="">Select supplier Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
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
                <div class="modal" id="deleteSupplierModal">
                    <div class="modal-dialog">
                        <form id="deleteSupplier">
                            @csrf
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Supplier</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <p>Are you sure you want to delete Supplier?</p>
                                            <input type="hidden" name="supplier_id" id="supplier_id">
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
            $("#addSupplier").submit(function(e) {

                e.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('admin.addSupplier') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        if (res.success == true) {
                            console.log("success", res);
                            location.reload();
                        } else {
                            //printErrorMsg(res);
                            alert("error", res.msg);
                        }
                    }
                });
            })


            // Edit
            var _token = $('input[name="_token"]').val();
            $('.editButton').click(function() {
                var supplier_id = $(this).attr('data-id');
                // console.log(supplier_id);
                $('#edit_supplier_id').val(supplier_id);
                $.ajax({
                    url: "{{ route('admin.editSupplier') }}",
                    type: 'POST',

                    data: {
                        id: supplier_id,
                        _token: _token
                    },
                    success: function(res) {
                        // console.log(res);
                        let edit_supplier_status = '<option>Select Item Type </option>';
                        if (res.success == true) {
                            // console.log(res.data.length);
                            for (let i = 0; i < res.data.length; i++) {
                                // console.log(res.data[i].sup_name);
                                $('#edit_supplier_name').val(res.data[i].sup_name);
                                $('#edit_supplier_company_name').val(res.data[i]
                                    .sup_company_name);
                                $('#edit_supplier_address').val(res.data[i].sup_office_address);
                                $('#edit_supplier_phone').val(res.data[i].sup_mob_no);
                                $('#edit_supplier_comp_phone').val(res.data[i].sup_comp_mob_no);
                                $('#edit_supplier_email').val(res.data[i].sup_email);
                                edit_supplier_status += '<option vlaue=' + res.data[i][
                                    'sup_status'
                                ] + '>' + res.data[i]['sup_status'] + '</option>';
                                // }
                            }

                            $('#edit_supplier_status').append(edit_supplier_status);

                        }

                    }
                })
            });

            //update_supplier
            $("#editSupplier").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('admin.updateSupplier') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        console.log(res);
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
                var supplier_id = $(this).attr('data-id');
                // console.log(item_id);
                $("#supplier_id").val(supplier_id);
            });


            $("#deleteSupplier").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                // console.log(formData);
                // alert('sedrfghj');
                $.ajax({
                    url: "{{route('admin.deleteSupplier')}}",
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


        });
    </script>
@endpush
