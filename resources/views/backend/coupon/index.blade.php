@extends('layouts.backend_master')
@section('content')
    <!-- Coupon list table starts-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Coupon List</h5>
                                <div class="right-options">
                                    <ul>
                                        <li>
                                            <a class="btn btn-solid" href="{{ route('coupon.create') }}">Add Coupon</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table class="table all-package coupon-list-table table-hover theme-table"
                                        id="table_id">
                                        <thead>
                                            <tr>
                                                <th>Coupon Name</th>
                                                <th>Coupon Discount (%)</th>
                                                <th>Validity</th>
                                                <th>Limit</th>
                                                <th>Highest Discount </th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($coupons as $coupon)
                                                <tr>
                                                    <td>{{ $coupon->coupon_name }}</td>
                                                    <td class="theme-color">{{ $coupon->coupon_discount }}%</td>
                                                    <td>{{ $coupon->validity }}</td>
                                                    <td>{{ $coupon->limit }}</td>
                                                    <td>{{ $coupon->highest_discount }}</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('coupon.edit',$coupon->id) }}" class="btn btn-sm btn-info">
                                                                    Edit
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <form action="{{ route('coupon.destroy',$coupon->id) }}" method="POST">
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
                                                    <td colspan="6" class="text-danger">No Coupon Available!!</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Pagination End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    @endsection
