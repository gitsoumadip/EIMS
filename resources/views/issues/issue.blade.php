<html>
<title>Invoice System</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<script src="{{asset('js/invoices.js')}}"></script>
<!-- <script src="js/invoice.js"></script> -->
<link href="style.css" rel="stylesheet">

<div class="container-fluid content-invoice">
    <div class="cards">
        <div class="card-bodys">
            <form>
                {{-- action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="" --}}
                @csrf
                <div class="load-animate animated fadeInUp">
                    <div class="row">
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <h2 class="title">Product Issue </h2>
                        </div>
                    </div>
                    <input id="currency" type="hidden" value="$">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <h6>Event Details,</h6>
                            <!-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> -->
                            <div class="form-group">
                                <select name="" id="eventOrderNumber">
                                    <option value="">Select Event name</option>
                                    @foreach ($eventOrderId as $eventOrderIds)
                                        {
                                        <option value="{{ $eventOrderIds->id }}">{{ $eventOrderIds->env_name }}</option>
                                        }
                                    @endforeach
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
                                <input type="text" class="form-control" name="person_name" id="person_name"
                                    placeholder="Person Name" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="person_phone" id="person_phone"
                                    placeholder="person Phone" autocomplete="off">
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
                                    <th>category</th>
                                    <th>brands</th>
                                    <th>modelNo</th>
                                    <th>product</th>
                                    <th>serial no</th>
                                    <th>store location</th>
                                    <th>price</th>

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
                                            @foreach ($category as $cat)
                                                {
                                                <option value="{{ $cat->cat_id }}">{{ $cat->cat_name }}</option>
                                                }
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="brands" id="brands">
                                            <option value="">Select brands name</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="modelNo" id="modelNo">
                                            <option value="">Select model no name</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="product" id="product">
                                            <option value="">Select product name</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="SerialNumber" id="SerialNumber">
                                            <option value="">Select serial no name</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select name="storeloc" id="storeloc">
                                            <option value="">Select Event name</option>
                                            @foreach ($eventOrderId as $eventOrderIds)
                                                {
                                                <option value="{{ $eventOrderIds->id }}">{{ $eventOrderIds->env_name }}
                                                </option>
                                                }
                                            @endforeach
                                        </select>
                                    </td>


                                    {{-- <td>
                                        <input type="number" name="price[]" id="price" class="form-control price"
                                            autocomplete="off">
                                    </td> --}}
                                    <td>
                                        <input type="number" name="total[]" id="total_1"
                                            class="form-control total" autocomplete="off">
                                    </td>
                                    {{-- <td>
                                        <button class="btn btn-danger delete" id="removeRows" type="button">--</button>
                                    </td> --}}
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

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
     $(document).ready(function() {
        $("#addRows").click(function() {
            var category = $('#category').val();
            var brands = $('#brands').val();
            var modelNo = $('#modelNo').val();
            var product = $('#product').val();
            var SerialNumber = $('#SerialNumber').val();
            var storeloc = $('#storeloc').val();
            // var price=$('#price').val();
            var category_name = $('#category :selected').text();
            var brands_name = $('#brands :selected').text();
            var modelNo_name = $('#modelNo :selected').text();
            var product_name = $('#product :selected').text();
            var SerialNumber_name = $('#SerialNumber :selected').text();
            var storeloc_name = $('#storeloc :selected').text();
            // alert("kjhgfcdxsza");


            var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + category_name +
                "</td><td>" + brands_name + "</td><td>" + modelNo_name + "</td><td>" + product_name +
                "</td><td>" + SerialNumber_name + "</td><td>" + storeloc_name + "</td>"
            "<input type='hidden' name='category[]' class='category' value=" + category + ">" +
                "<input type='hidden' name='brands[]' class='brands' value=" + brands + ">" +
                "<input type='hidden' name='modelNo[]' class='modelNo' value=" + modelNo + ">" +
                "<input type='hidden' name='product[]' class='product' value=" + product + ">" +
                "<input type='hidden' name='SerialNumber[]' class='SerialNumber' value=" +
                SerialNumber + ">" +
                "<input type='hidden' name='storeloc[]' class='storeloc' value=" + storeloc + ">";
            // var markup="<td>'kjhgfcdxs'</td>";

            $('table tbody').append(markup);
            // alert('markup');
        });
     });
</script>
<script>
    $(document).ready(function() {
        $('#eventOrderNumber').on('change', function() {
            var eventId = $(this).val();
            // console.log(eventId);
            $.ajax({
                url: "{{ route('admin.eventOredrs') }}",
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


        //  // brand
        $('#category').on('change', function() {
            var categoryId = $(this).val();
            // console.log(categoryId);
            $.ajax({
                url: "{{ route('admin.category') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    categoryId: categoryId
                },
                success: function(data) {
                    // console.log(data);
                    // console.log(data['brand'][0]);
                    // console.log(data['brand'][1]['item_brand']);

                    // console.log(data['brand'].length);
                    if (data['brand'].length > 0) {
                        $('#brands').html(' <option value="">Select brands name</option>');
                        $.each(data['brand'], function(key, value) {
                            // console.log(value.brand_id);
                            $('#brands').append('<option value=' + value.brand_id + '>' + value.brands[0].brand_name + '</option>');
                        })
                    }

                    // location.reload();
                    // $('#brands').html(data);
                    // alert(data);
                    // location.reload();
                }

            });
        });

    //   model
        $("#category,#brands").on('change', function() {
            var cId = $('#category').val();
            var bId = $('#brands').val();
            $.ajax({
                url: "{{ route('admin.brandId') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    cId: cId,
                    bId: bId
                },
                success: function(data) {
                    // console.log(data['model']);
                    // alert(data);
                    // $('#modelNo').html(data);
                    if (data['model'].length > 0) {
                        $('#modelNo').html('<option value="">Select Model name</option>');
                        $.each(data['model'], function(key, value) {
                            // console.log(value['model_no'][0]['mdl_name']);
                            $('#modelNo').append('<option value=' + value[
                                'models_id'] + '>' + value['model_no'][
                                0
                            ]['mdl_name'] + '</option>');
                        })
                    }
                }
            });
        });

        // product
        $("#category,#brands,#modelNo").on('change', function() {
            var cId = $('#category').val();
            var bId = $('#brands').val();
            var mId = $('#modelNo').val();

            $.ajax({
                url: "{{ route('admin.modelId') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    cId: cId,
                    bId: bId,
                    mId: mId
                },
                success: function(data) {
                    console.log(data);
                    // console.log(data['product'][0]['item_name']);
                    // console.log(data['product'][0]['products'][0]['product_name']);

                    // alert(data);
                    // $('#modelNo').html(data);
                    if (data['product'].length > 0) {
                        $('#product').html('<option value="">Select Product name</option>');
                        $.each(data['product'], function(key, value) {
                            console.log(value['products'][0]['product_name']);
                            $('#product').append('<option value=' + value[
                                'products_id'] + '>' + value['products'][0][
                                'product_name'
                            ] + '</option>');
                        });
                    }
                }
            });
        });

// serial number
        $("#category,#brands,#modelNo,#product").on('change', function() {
            var cId = $('#category').val();
            var bId = $('#brands').val();
            var mId = $('#modelNo').val();
            var pId = $('#product').val();

            $.ajax({
                url: "{{ route('admin.productId') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    cId: cId,
                    bId: bId,
                    mId: mId,
                    pId: pId
                },
                success: function(data) {
                    // console.log(data);

                    if (data['productSerialNo'].length > 0) {
                        $('#SerialNumber').html(
                            '<option value="">Select Serial number</option>');
                        $.each(data['productSerialNo'], function(key, value) {
                            // console.log(value['item_sl_no']);
                            $('#SerialNumber').append('<option value=' + value[
                                    'item_sl_no'] + '>' + value['item_sl_no'] +
                                '</option>');
                        })
                    }
                }
            });
        });
        // **********************************************************************************************************************************************************



    });
</script>
