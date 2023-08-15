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
                                <h5>All Category ({{ $categories->count() }})</h5>
                                <form class="d-inline-flex">
                                    <a href="{{ route('category.create') }}" class="align-items-center btn btn-theme">
                                        <i data-feather="plus-square"></i>Add New
                                    </a>
                                </form>
                            </div>

                            <div class="table-responsive category-table">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Category Name</th>
                                            <th>Date</th>
                                            <th>Category Icon</th>
                                            <th>Slug</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    @forelse ($categories as $category)
                                        <tbody>
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $category->category_name }}</td>

                                                <td>{{ $category->created_at }}</td>

                                                <td>
                                                    <div class="table-image">
                                                        <img src="{{ asset('uploads/category_icons') }}/{{ $category->category_icon }}"
                                                            class="img-fluid" alt="not found">
                                                    </div>
                                                </td>

                                                <td>{{ $category->slug }}</td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('category.show', $category->id) }}">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ route('category.edit', $category->id) }}">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <form action="{{ route('category.destroy', $category->id) }}"
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
                                        </tbody>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <p class="text-danger">No Category Available!!</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- ============ Recycle Bin Start ============== --}}


                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Recycle Bin Category </h5>
                            </div>

                            <div class="table-responsive category-table">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Category Name</th>
                                            <th>Date</th>
                                            <th>Category Icon</th>
                                            <th>Slug</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    @forelse ($deleted_categories as $deleted_category)
                                        <tbody>
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $deleted_category->category_name }}</td>

                                                <td>{{ $deleted_category->created_at }}</td>

                                                <td>
                                                    <div class="table-image">
                                                        <img src="{{ asset('uploads/category_icons') }}/{{ $deleted_category->category_icon }}"
                                                            class="img-fluid" alt="not found">
                                                    </div>
                                                </td>

                                                <td>{{ $deleted_category->slug }}</td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('category.restore', $deleted_category->id) }}" class="btn btn-sm btn-success">
                                                                Restore
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ route('category.delete', $deleted_category->id) }}" class="btn btn-sm btn-secondary">
                                                                Empty
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <p class="text-danger">No Recycle Bin Category Available!!</p>
                                            </td>
                                        </tr>
                                    @endforelse
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
