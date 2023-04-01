<html>
<title>Invoice System</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<!-- <script src="js/invoice.js"></script> -->
<link href="style.css" rel="stylesheet">
<?php // include('container.php');
?>
<div class="container-fluid content-invoice">
    <div class="cards">
        <div class="card-bodys">
            <form>
                {{-- action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="" --}}
                @csrf
                <div class="load-animate animated fadeInUp">
                    <div class="row">
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <h2 class="title">PHP Invoice System</h2>
                        </div>
                    </div>
                    <input id="currency" type="hidden" value="$">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <h3>Event Details,</h3>
                            <!-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> -->
                            <div class="form-group">
                                <select name="" id="eventOrderNumber">
                                    <option value="">Select Event name</option>
                                    {{-- @foreach ($eventOrderId as $eventOrderIds)
                                        {
                                        <option value="{{ $eventOrderIds->id }}">{{ $eventOrderIds->env_name }}</option>
                                        }
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="form-group">
                                <p id="envNumber"></p>
                                <p id="envName"></p>
                                <p id="envLoc"></p>
                                <p id="envPerson"></p>
                                <p id="envPersonNo."></p>
                                <p id="envDate"></p>

                            </div>
                            <!-- </div> -->
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <h3>To,</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" name="companyName" id="companyName"
                                    placeholder="Company Name" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="companyName" id="companyName"
                                    placeholder="Company Name" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="companyName" id="companyName"
                                    placeholder="Company Name" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- *********************************************************** -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table class="table table-condensed table-striped" id="invoiceItem">
                                <tr>
                                    <th width="2%">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="checkAll"
                                                name="checkAll">
                                            <label class="custom-control-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th>Item No</th>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="itemRow custom-control-input" id="itemRow_1">
                                            <label class="custom-control-label" for="itemRow_1"></label>
                                        </div>
                                    </td>
                                    <td>
                                        {{-- {{$category}} --}}
                                        <select name="category" id="category">
                                            <option value="">Select Category</option>
                                            {{-- @foreach ($category as $cat)
                                                {
                                                <option value="{{ $cat->cat_id }}">{{ $cat->cat_name }}</option>
                                                }
                                            @endforeach --}}
                                        </select>
                                    </td>
                                    <td>
                                        <select name="brands" id="brands">
                                            <option value="">Select Event name</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="modelNo" id="modelNo">
                                            <option value="">Select Event name</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="" id="eventOrderNumber">
                                            <option value="">Select Event name</option>
                                            {{-- @foreach ($eventOrderId as $eventOrderIds)
                                                {
                                                <option value="{{ $eventOrderIds->id }}">{{ $eventOrderIds->env_name }}</option>
                                                }
                                            @endforeach --}}
                                        </select>
                                    </td>
                                    <td>
                                        <select name="" id="eventOrderNumber">
                                            <option value="">Select Event name</option>
                                            {{-- @foreach ($eventOrderId as $eventOrderIds)
                                                {
                                                <option value="{{ $eventOrderIds->id }}">{{ $eventOrderIds->env_name }}</option>
                                                }
                                            @endforeach --}}
                                        </select>
                                    </td>
                                    <td>
                                        <select name="" id="eventOrderNumber">
                                            <option value="">Select Event name</option>
                                            {{-- @foreach ($eventOrderId as $eventOrderIds)
                                                {
                                                <option value="{{ $eventOrderIds->id }}">{{ $eventOrderIds->env_name }}</option>
                                                }
                                            @endforeach --}}
                                        </select>
                                    </td>
                                    <td>
                                        <select name="" id="eventOrderNumber">
                                            <option value="">Select Event name</option>
                                            {{-- @foreach ($eventOrderId as $eventOrderIds)
                                                {
                                                <option value="{{ $eventOrderIds->id }}">{{ $eventOrderIds->env_name }}</option>
                                                }
                                            @endforeach --}}
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="price[]" id="price_1" class="form-control price"
                                            autocomplete="off">
                                    </td>
                                    <td>
                                        <input type="number" name="total[]" id="total_1" class="form-control total"
                                            autocomplete="off">
                                    </td>
                                    <td>
                                        <button class="btn btn-danger delete" id="removeRows" type="button">--</button>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
                            <button class="btn btn-success" id="addRows" type="button">+ Add More</button>
                        </div>
                    </div>
                    <!-- ******************************************************* -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group mt-3 mb-3 ">
                                <label>Subtotal: &nbsp;</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text currency">$</span>
                                    </div>
                                    <input value="" type="number" class="form-control" name="subTotal"
                                        id="subTotal" placeholder="Subtotal">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group mt-3 mb-3 ">
                                <label>Tax Rate: &nbsp;</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text currency">%</span>
                                    </div>
                                    <input value="" type="number" class="form-control" name="taxRate"
                                        id="taxRate" placeholder="Tax Rate">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group mt-3 mb-3 ">
                                <label>Tax Amount: &nbsp;</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text currency">$</span>
                                    </div>
                                    <input value="" type="number" class="form-control" name="taxAmount"
                                        id="taxAmount" placeholder="Tax Amount">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group mt-3 mb-3 ">
                                <label>Total: &nbsp;</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text currency">$</span>
                                    </div>
                                    <input value="" type="number" class="form-control" name="totalAftertax"
                                        id="totalAftertax" placeholder="Total">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group mt-3 mb-3 ">
                                <label>Amount Paid: &nbsp;</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text currency">$</span>
                                    </div>
                                    <input value="" type="number" class="form-control" name="amountPaid"
                                        id="amountPaid" placeholder="Amount Paid">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group mt-3 mb-3 ">
                                <label>Amount Due: &nbsp;</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text currency">$</span>
                                    </div>
                                    <input value="" type="number" class="form-control" name="amountDue"
                                        id="amountDue" placeholder="Amount Due">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <h3>Notes: </h3>
                            <div class="form-group">
                                <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Your Notes"></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn"
                                    value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">
                            </div>
                        </div>
                    </div>
                    <!-- ********************************************************* -->
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- <script>
    $(document).ready(function() {
        $('#eventOrderNumber').on('change', function() {
            var eventId = $(this).val();
            // console.log(eventId);
            $.ajax({
                url: "{{ route('eventOredr') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    eventId: eventId
                },
                success: function(data) {
                    // alert(data);
                    // console.log(data);
                    $('#envNumber').html(data.env_number);
                    $('#envName').html(data.env_name);
                    $('#envLoc').html(data.env_loc);
                    $('#envPerson').html(data.env_person_name);
                    $('#envPersonNo').html(data.env_person_ph);
                    $('#envDate').html(data.env_date);
                }
            });
        });

        $('#category').on('change', function(){
            var categoryId=$(this).val();
            // console.log(categoryId);
            $.ajax({
                url:"{{route('category')}}",
                type:"post",
                data:{ "_token": "{{ csrf_token() }}",
                categoryId:categoryId},
                success:function(data){
                    console.log(data);
                    $('#brands').html(data);
                    // alert(data);
                }
            });
        });

        $("#category,#brands").on('change',function(){
        var cId=$('#category').val();
        var bId=$('#brands').val();
        $.ajax({
            url:"{{route('brandId')}}",
            type:"post",
            data:{"_token": "{{ csrf_token() }}",cId:cId,bId:bId},
            success:function(data){
                // console.log(data);
                // alert(data);
                $('#modelNo').html(data);
            }
        });
        });
    });
</script> --}}
