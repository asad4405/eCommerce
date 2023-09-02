@extends('layouts.backend_master')
@section('content')
    <!-- Container-fluid starts-->
    <div class="page-body">
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>All Delivery Cost Option</h5>
                                <form class="d-inline-flex">
                                    <a href="{{ route('delivery.create') }}" class="align-items-center btn btn-theme">
                                        <i data-feather="plus-square"></i>Add New
                                    </a>
                                </form>
                            </div>

                            @if (session('color-delete'))
                                <div class="alert alert-secondary">{{ session('color-delete') }}</div>
                            @endif

                            <div class="table-responsive category-table">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Product Delivery Address</th>
                                            <th>Product Delivery Cost </th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($deliveries as $delivery)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $delivery->product_delivery_address }} taka</td>

                                                <td>{{ $delivery->product_delivery_cost }} taka</td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('delivery.edit',$delivery->id) }}" class="btn btn-sm btn-info">
                                                                Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('delivery.destroy', $delivery->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-secondary">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="text-danger">No Colors Available</td>
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
    <!-- All User Table Ends-->
@endsection
