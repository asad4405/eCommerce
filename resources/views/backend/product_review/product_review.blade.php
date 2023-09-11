@extends('layouts.backend_master')
@section('content')
    <div class="page-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <!-- Table Start -->
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Product Reviews</h5>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table class="user-table ticket-table review-table theme-table table" id="table_id">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Customer Name</th>
                                                <th>Product Name</th>
                                                <th>Rating</th>
                                                <th>Comment</th>
                                                <th>Published</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reviews as $review)
                                                <tr>
                                                    <td>{{ $loop->index +1 }}</td>
                                                    <td>{{ $review->user->name }}</td>
                                                    <td>{{ $review->product->product_name }}</td>
                                                    <td>
                                                        <ul class="rating">
                                                            @for ($i = 1; $i <= $review->rating; $i++)
                                                                <li>
                                                                    <i class="fas fa-star theme-color"></i>
                                                                </li>
                                                            @endfor
                                                            @for ($i = 1; $i <= 5 - $review->rating; $i++)
                                                                <li>
                                                                    <i class="fas fa-star"></i>
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                    </td>
                                                    <td>{{ $review->review }}</td>
                                                    <td class="td-check">
                                                        <i class="ri-checkbox-circle-line"></i>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Table End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
