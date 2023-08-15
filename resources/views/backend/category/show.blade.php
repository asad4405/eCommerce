@extends('layouts.backend_master')
@section('content')
    <!-- Container-fluid starts-->
    <div class="page-body">
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Category of - [{{ $category->category_name }}]</h5>
                            </div>

                            <div class="table-responsive category-table">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Header</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Category Name</td>
                                            <td>{{ $category->category_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Category Details</td>
                                            <td>{{ $category->category_details }}</td>
                                        </tr>

                                        <tr>
                                            <td>Date</td>
                                            <td>{{ $category->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <td>Category Icon</td>
                                            <td>
                                                <div class="table-image">
                                                    <img src="{{ asset('uploads/category_icons') }}/{{ $category->category_icon }}"
                                                        class="img-fluid" alt="not found">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Slug</td>
                                            <td>{{ $category->slug }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- All User Table Ends-->
    </div>
@endsection
