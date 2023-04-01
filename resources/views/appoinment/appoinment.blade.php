@extends('structure.structure')
@section('appoinment-active', 'active')
@section('title', __('Appoinment'))
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAppoinmentModal">
                Add Appoinment
            </button>
            <div class="bg-secondary rounded p-4 mt-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> Name</th>
                                <th scope="col"> Phone</th>
                                <th scope="col"> email</th>
                                <th scope="col"> Requirement</th>
                                <th scope="col"> Date Of Program</th>
                                <th scope="col"> Client Discussion Details</th>
                                <th scope="col"> Reference</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($appoinment) > 0)
                                @foreach ($appoinment as $key => $appoinment)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>{{ $appoinment->client_name }}</td>
                                        <td>{{ $appoinment->clint_phone }}</td>
                                        <td>{{ $appoinment->clint_email }}</td>
                                        <td>{{ $appoinment->clint_requirement }}</td>
                                        <td>{{ $appoinment->dateOfProgram }}</td>
                                        <td>{{ $appoinment->client_discussion_details }}</td>
                                        <td>{{ $appoinment->client_reference }}</td>
                                        <td>{{ $appoinment->status }}</td>
                                        <td>
                                            <button class="btn btn-info editButton" data-id="{{ $appoinment->id }}"
                                                data-appoinment="{{ $appoinment->client_name }}"
                                                data-status="{{ $appoinment->status }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editAppoinmentModal">Edit</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger deleteButton" data-id="{{ $appoinment->id  }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteAppoinmentModal">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10">Appoinment Details are not Found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>


                <!-- Add Appoinment Modal -->
                <div class="modal" id="addAppoinmentModal">
                    <div class="modal-dialog">
                        <form id="addAppoinment">
                            @csrf
                            <div class="modal-content  bg-secondary">

                                <!-- Modal Header -->
                                <div class="modal-header  bg-secondary">
                                    <h4 class="modal-title">Add Appoinment</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body  bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="appoinment_name" placeholder="Enter Appoinment Name"
                                                class="w-100 form-control">
                                            <span class="error appoinment_name_error"></span>
                                            <br><br>
                                            <input type="text" name="appoinment_ph_no" placeholder="Enter Appoinment Phone Number"
                                                class="w-100 form-control">
                                            <span class="error appoinment_ph_no_error"></span>
                                            <br><br>
                                            <input type="text" name="appoinment_email" placeholder="Enter Appoinment Email Id"
                                                class="w-100 form-control">
                                            <span class="error appoinment_email_error"></span>
                                            <br><br>
                                            <input type="text" name="appoinment_requirement" placeholder="Enter Appoinment Requirement"
                                                class="w-100 form-control">
                                            <span class="error appoinment_requirement_error"></span>
                                            <br><br>
                                            <input type="text" name="dateOfProgramm" placeholder="Enter Date Of Programm"
                                                class="w-100 form-control">
                                            <span class="error dateOfProgramm_error"></span>
                                            <br><br>
                                            <input type="text" name="appoinmen_discussion_details" placeholder="Enter Appoinment Discussion Details"
                                                class="w-100 form-control">
                                            <span class="error appoinmen_discussion_details_error"></span>
                                            <br><br>
                                            <input type="text" name="appoinmen_reference" placeholder="Enter Appoinment  Reference"
                                                class="w-100 form-control">
                                            <span class="error appoinmen_reference_error"></span>
                                            <br><br>
                                            <select name="appoinmen_status" class="w-100 form-control">
                                                <option value="">Select Appoinmen Status</option>
                                                <option value="active">active</option>
                                                <option value="inactive">inactive</option>
                                            </select>
                                            <span class="error appoinmen_status_error"></span>
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

                <!-- Update Appoinment Modal -->
                <div class="modal" id="editAppoinmentModal">
                    <div class="modal-dialog">
                        <form id="editAppoinment">
                            @csrf
                            <div class="modal-content  bg-secondary">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Appoinment</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                               <!-- Modal body -->
                               <div class="modal-body  bg-secondary">
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="edit_appoinment_id" id="edit_appoinment_id">
                                        <input type="text" name="edit_appoinment_name" id="edit_appoinment_name" placeholder="Enter Appoinment Name"
                                            class="w-100 form-control">
                                        <span class="error appoinment_name_error"></span>
                                        <br><br>
                                        <input type="number" name="edit_appoinment_ph_no" id="edit_appoinment_ph_no" placeholder="Enter Appoinment Phone Number" class="w-100 form-control">
                                        <span class="error appoinment_ph_no_error"></span>
                                        <br><br>
                                        <input type="email" name="edit_appoinment_email" id="edit_appoinment_email" placeholder="Enter Appoinment Email Id"class="w-100 form-control">
                                        <span class="error appoinment_email_error"></span>
                                        <br><br>
                                        <input type="text" name="edit_appoinment_requirement" id="edit_appoinment_requirement" placeholder="Enter Appoinment Requirement" class="w-100 form-control">
                                        <span class="error appoinment_requirement_error"></span>
                                        <br><br>
                                        <input type="date" name="edit_dateOfProgramm" id="edit_dateOfProgramm" placeholder="Enter Date Of Programm"  class="w-100 form-control">
                                        <span class="error dateOfProgramm_error"></span>
                                        <br><br>
                                        <input type="text" name="edit_appoinmen_discussion_details" id="edit_appoinmen_discussion_details" placeholder="Enter Appoinment Discussion Details" class="w-100 form-control">
                                        <span class="error appoinmen_discussion_details_error"></span>
                                        <br><br>
                                        <input type="text" name="edit_appoinmen_reference" id="edit_appoinmen_reference" placeholder="Enter Appoinment  Reference" class="w-100 form-control">
                                        <span class="error appoinmen_reference_error"></span>
                                        <br><br>
                                        <select name="edit_appoinmen_status" id="edit_appoinmen_status" class="w-100 form-control">
                                            <option value="">Select Appoinmen Status</option>
                                            <option value="active">active</option>
                                            <option value="inactive">inactive</option>
                                        </select>
                                        <span class="error appoinmen_status_error"></span>
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
                <div class="modal" id="deleteAppoinmentModal">
                    <div class="modal-dialog">
                        <form id="deleteAppoinment">
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
                                            <input type="hidden" name="delete_appoinment_id" id="delete_appoinment_id">
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer  ">
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
            //Appoinment Add
            $("#addAppoinment").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                // console.log(formData);
                $.ajax({
                    url: "{{ route('admin.addAppoinment') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        // console.log(res);
                        if (res.success == true) {
                            location.reload();
                        } else {
                            printErrorMsg(res);
                        }
                    }
                });
            });

            // //Edit Brand

            var _token = $('input[name="_token"]').val();
            $('.editButton').click(function() {
                var appoinment_id = $(this).attr('data-id');
                // console.log(item_id);
                $('#edit_appoinment_id').val(appoinment_id);
                $.ajax({
                    url: "{{ route('admin.editappoinment') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: appoinment_id,
                        _token: _token
                    },
                    success: function(res) {
                        console.log(res);
                        let editStatus = '<option>Select Appoinment Type </option>';
                        if (res.success == true) {
                        //     // console.log(res.data.length);

                            for (let i = 0; i < res.data.length; i++) {
                                $('#edit_appoinment_name').val(res.data[i].client_name);
                                $('#edit_appoinment_ph_no').val(res.data[i].clint_phone);
                                $('#edit_appoinment_email').val(res.data[i].clint_email);
                                $('#edit_appoinment_requirement').val(res.data[i].clint_requirement);
                                $('#edit_dateOfProgramm').val(res.data[i].dateOfProgram);
                                 $('#edit_appoinmen_discussion_details').val(res.data[i].client_discussion_details);
                                 $('#edit_appoinmen_reference').val(res.data[i].client_reference);
                                editStatus += '<option vlaue=' + res.data[i]['status'] +
                                    '>' + res.data[i]['status'] + '</option>';
                            }
                        }

                        $('#edit_appoinmen_status').append(editStatus);
                    }
                });
            });


            $("#editAppoinment").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('admin.updateAppoinment') }}",
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


            //Delete Brand
            $(".deleteButton").click(function() {
                var appoinment_id = $(this).attr('data-id');
                // console.log(appoinment_id);
                $("#delete_appoinment_id").val(appoinment_id);
            });

            $("#deleteAppoinment").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.deletAppoinment') }}",
                    method: "DELETE",
                    data: formData,
                    success: function(data) {
                        console.log(data);
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

