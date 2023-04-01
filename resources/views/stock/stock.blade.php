@extends('structure.structure')
@section('stock-active', 'active')
@section('title', __('Stock'))
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

            <div class="bg-secondary rounded p-4 mt-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Brand Name </th>
                                <th scope="col">Category Name </th>
                                <th scope="col">Model No. </th>
                                <th scope="col">Total Qty </th>
                                <th scope="col">Out Qty</th>
                                <th scope="col">In Stock Qty </th>

                            </tr>
                        </thead>
                        <tbody id="tableaData">
                            {{-- {{$item}} --}}
                            {{-- {{$categorys}} --}}
                            @if (count($item) > 0)
                                @foreach ($item as $key => $stock)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}</td>
                                        <td>{{ $stock->products[0]['product_name'] }}</td>
                                        <td>{{ $stock->brands[0]['brand_name'] }}</td>
                                        <td>{{ $stock->categories[0]['cat_name'] }}</td>
                                        <td>{{ $stock->modelNo[0]['mdl_name'] }}</td>
                                        {{-- <td>{{ $stock->in_item_qty }}</td> --}}
                                        <td><a href="#">{{ $stock->total }}</a></td>
                                        <td>{{ $stock->outitem }}</td>
                                        <td>{{ $stock->total- $stock->outitem }}</td>


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
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush


