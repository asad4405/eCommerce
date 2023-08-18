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
                                <h5>All Colors Attribute</h5>
                                <form class="d-inline-flex">
                                    <a href="{{ route('attribute.create') }}" class="align-items-center btn btn-theme">
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
                                            <th>Color Name</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($colors as $color)
                                            <tr>

                                                <td>{{ $color->color_name }}</td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <form action="{{ route('color.delete', $color->id) }}"
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
                                <span class="text-center my-3">
                                    {{ $colors->links() }}
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>All Sizes Attribute</h5>
                            </div>

                            @if (session('size-delete'))
                                <div class="alert alert-secondary">{{ session('size-delete') }}</div>
                            @endif

                            <div class="table-responsive category-table">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Color Name</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($sizes as $size)
                                            <tr>

                                                <td>{{ $size->size_name }}</td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <form action="{{ route('size.delete', $size->id) }}"
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
                                                <td colspan="2" class="text-danger">No Sizes Available</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <span class="text-center my-3">
                                    {{ $sizes->links() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All User Table Ends-->
@endsection
