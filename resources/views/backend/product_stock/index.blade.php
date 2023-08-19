@extends('layouts.backend_master')
@section('content')
    <!-- Container-fluid starts-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Inventory List</h5>
                                <div class="right-options">
                                    <ul>
                                        <li>
                                            <a class="btn btn-solid" href="{{ route('stock.create') }}">Add Stock</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table class="table all-package theme-table table-product" id="table_id">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Product Qty</th>
                                                <th>Product Price</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($inventories as $inventory)
                                                <tr>
                                                    <td>{{ $inventory->relationtoProduct->product_name }}</td>
                                                    <td>{{ $inventory->relationtoColor->color_name }}</td>
                                                    <td>{{ $inventory->relationtoSize->size_name }}</td>
                                                    <td>{{ $inventory->product_quantity }}</td>
                                                    <td>
                                                        @if ($inventory->product_regular_price == $inventory->product_discount_price)
                                                            {{ $inventory->product_discount_price }} taka
                                                        @else
                                                            {{ $inventory->product_discount_price }} taka
                                                            &nbsp;&nbsp;&nbsp;
                                                            <del class="text-danger">{{ $inventory->product_regular_price }}
                                                                taka</del>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('stock.edit', $inventory->id) }}">
                                                                    <i class="ri-pencil-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <form action="{{ route('stock.destroy', $inventory->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn text-danger">
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" text-danger>No Available Products</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
