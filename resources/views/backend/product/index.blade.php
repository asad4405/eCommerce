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
                                <h5>Products List</h5>
                                <div class="right-options">
                                    <ul>
                                        <li>
                                            <a class="btn btn-solid" href="{{ route('product.create') }}">Add Product</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table class="table all-package theme-table table-product" id="table_id">
                                        <thead>
                                            <tr>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Current Qty</th>
                                                <th>Price</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($products as $product)
                                                <tr>
                                                    <td>
                                                        <div class="table-image">
                                                            <img src="{{ asset('uploads/product_photos') }}/{{ App\Models\Product_photo::where('product_id',$product->id)->get()->first()->product_photos }}"
                                                                class="img-fluid" alt="">
                                                        </div>
                                                    </td>

                                                    <td>{{ $product->product_name }}</td>

                                                    <td>{{ $product->relationToCategory->category_name }}</td>

                                                    <td>-</td>

                                                    <td class="td-price">-</td>

                                                    <td>
                                                        <ul>

                                                            <li>
                                                                <a href="{{ route('product.edit', $product->id) }}">
                                                                    <i class="ri-pencil-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <form action="{{ route('product.destroy',$product->id) }}" method="POST">
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
