@extends('structure.structure')
@section('event-active', 'active')
@section('title', __('Event'))
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
                Add Event
            </button>
            <div class="bg-secondary rounded p-4 mt-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th colspan="2" scope="col">Action</th>
                                <th scope="col">Event Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Date</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Person Name</th>
                                <th scope="col">Person Phone</th>
                                <th scope="col">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if (count($event) > 0)
                                @foreach ($event as $key => $events)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>
                                            <button class="btn btn-info editButton" data-id="{{ $events->id }}"
                                                data-events-name="{{ $events->env_name }}" data-bs-toggle="modal"
                                                data-bs-target="#editEventModal">Edit</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger deleteButton" data-id="{{ $events->id }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteEventModal">Delete</button>
                                        </td>
                                        <td>{{ $events->env_number }}</td>
                                        <td>{{ $events->env_name }}</td>
                                        <td>{{ $events->env_loc }}</td>
                                        <td>{{ $events->env_date }}</td>
                                        <td>{{ $events->env_st_time }}</td>
                                        <td>{{ $events->env_end_time }}</td>
                                        <td>{{ $events->env_person_name }}</td>
                                        <td>{{ $events->env_person_ph }}</td>
                                        <td>{{ $events->env_status }}</td>
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
                <div class="modal" id="addEventModal">
                    <div class="modal-dialog">
                        <form id="addEvent">
                            @csrf
                            <div class="modal-content  bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Event</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body  bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="event_name" placeholder="Enter Event Name"
                                                class="w-100 form-control">
                                            <span class="error event_name_error"></span>
                                            <br><br>
                                            <input type="text" name="event_Loc" placeholder="Enter Event Location"
                                                class="w-100 form-control">
                                            <span class="error event_Loc_error"></span>
                                            <br><br>
                                            <input type="date" name="event_date" placeholder="select Event Date"
                                                class="w-100 form-control">
                                            <span class="error event_date_error"></span>
                                            <br><br>
                                            <input type="time" name="event_strt_time"
                                                placeholder="select event start time" class="w-100 form-control">
                                            <span class="error event_strt_time_error"></span>
                                            <br><br>
                                            <input type="time" name="event_end_time" placeholder="select Event End time"
                                                class="w-100 form-control">
                                            <span class="error event_end_time_error"></span>
                                            <br><br>
                                            <input type="text" name="event_person_name"
                                                placeholder="Enter Event person Name" class="w-100 form-control">
                                            <span class="error event_person_name_error"></span>
                                            <br><br>
                                            <input type="text" name="event_person_phone"
                                                placeholder="Enter Event person Phone No." class="w-100 form-control">
                                            <span class="error event_person_phone_error"></span>
                                            <br><br>
                                            <select name="event_status" class="w-100 form-control">
                                                <option value="">Select</option>
                                                <option value="active">active</option>
                                                <option value="inactive">inactive</option>
                                            </select>
                                            <span class="error event_status_error"></span>
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
                <div class="modal" id="editEventModal">
                    <div class="modal-dialog">
                        <form id="editEvent">
                            @csrf
                            <div class="modal-content  bg-secondary">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Event</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body  bg-secondary">
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="edit_event_id" id="edit_edit_event_id">
                                            <input type="text" name="edit_event_name" id="edit_event_name"
                                                placeholder="Enter edit_Event Name" class="w-100 form-control">
                                            <span class="error edit_event_name_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_event_Loc" id="edit_event_Loc"
                                                placeholder="Enter edit_Event Location" class="w-100 form-control">
                                            <span class="error edit_event_Loc_error"></span>
                                            <br><br>
                                            <input type="date" name="edit_event_date" id="edit_event_date"
                                                placeholder="select edit_Event Date" class="w-100 form-control">
                                            <span class="error edit_event_date_error"></span>
                                            <br><br>
                                            <input type="time" name="edit_event_strt_time" id="edit_event_strt_time"
                                                placeholder="select edit_event start time" class="w-100 form-control">
                                            <span class="error edit_event_strt_time_error"></span>
                                            <br><br>
                                            <input type="time" name="edit_event_end_time" id="edit_event_end_time"
                                                placeholder="select edit_Event End time" class="w-100 form-control">
                                            <span class="error edit_event_end_time_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_event_person_name"
                                                id="edit_event_person_name" placeholder="Enter edit_Event person Name"
                                                class="w-100 form-control">
                                            <span class="error edit_event_person_name_error"></span>
                                            <br><br>
                                            <input type="text" name="edit_event_person_phone"
                                                id="edit_event_person_phone"
                                                placeholder="Enter edit_Event person Phone No."
                                                class="w-100 form-control">
                                            <span class="error edit_event_person_phone_error"></span>
                                            <br><br>
                                            <select name="edit_event_status" id="edit_event_status"
                                                class="w-100 form-control">
                                                <option value="">Select</option>
                                                <option value="active">active</option>
                                                <option value="inactive">inactive</option>
                                            </select>
                                            <span class="error edit_event_status_error"></span>
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
                <div class="modal" id="deleteEventModal">
                    <div class="modal-dialog">
                        <form id="deleteEvent">
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
                                            <p>Are you sure you want to delete event?</p>
                                            <input type="hidden" name="event_id" id="delete_event_id">
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
            //Event Add
            $("#addEvent").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.addEvent') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        if (res.success == true) {
                            location.reload();
                            // console.log(res);
                        } else {
                            printErrorMsg(res);
                        }
                    }
                });
            });

            //Edit event
            var _token = $('input[name="_token"]').val();
            $('.editButton').click(function() {
                var event_id = $(this).attr('data-id');
                // console.log(event_id);
                $('#edit_event_id').val(event_id);
                $.ajax({
                    url: "{{ route('admin.editEvent') }}",
                    type: 'POST',

                    data: {
                        id: event_id,
                        _token: _token
                    },
                    success: function(res) {
                        // console.log(res);
                        let event_status = '<option>Select Item Type</option>';
                        if (res.success == true) {
                            // console.log(res.data.length);
                            for (let i = 0; i < res.data.length; i++) {
                                $("#edit_event_name").val(res.data[i].env_name);
                                $("#edit_event_Loc").val(res.data[i].env_loc);
                                $("#edit_event_date").val(res.data[i].env_date);
                                $("#edit_event_strt_time").val(res.data[i].env_st_time);
                                $("#edit_event_end_time").val(res.data[i].env_end_time);
                                $("#edit_event_person_name").val(res.data[i].env_person_name);
                                $("#edit_event_person_phone").val(res.data[i].env_person_ph);

                                event_status += '<option vlaue=' + res.data[i][
                                    'env_status'
                                ] + '>' + res.data[i]['env_status'] + '</option>';
                                // }
                            }

                            $('#edit_event_status').append(event_status);

                        }

                    }
                })
            });

            //update event

            $("#editEvent").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                // console.log(formData);
                $.ajax({
                    url: "{{ route('admin.updateEvent') }}",
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
                var event_id = $(this).attr('data-id');
                $("#delete_event_id").val(event_id);
            });

            $("#deleteEvent").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.deleteEvent') }}",
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
