@extends('layouts.backend_master')
@section('content')
    <div class="page-body">
        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="row">
                        <div class="col-xxl-8 col-lg-10 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Add Color Attribute</h5>
                                    </div>

                                    @if (session('color-success'))
                                        <div class="alert alert-success">{{ session('color-success') }}</div>
                                    @endif

                                    @if (session('color-error'))
                                        <div class="alert alert-secondary">{{ session('color-error') }}</div>
                                    @endif

                                    <form class="theme-form theme-form-2 mega-form" action="{{ route('color.store') }}"
                                        method="POST">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Color
                                                Name</label>
                                            <div class="col-sm-9">
                                                <input class="" type="text" id="color" placeholder="Color Name"
                                                    name="color_name">
                                                @error('color_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0"></label>
                                            <div class="col-sm-9">
                                                <button class="btn theme-bg-color text-white">Add New Color</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Add Size Attribute</h5>
                                    </div>

                                    @if (session('size-success'))
                                        <div class="alert alert-success">{{ session('size-success') }}</div>
                                    @endif

                                    @if (session('size-error'))
                                        <div class="alert alert-secondary">{{ session('size-error') }}</div>
                                    @endif

                                    <form class="theme-form theme-form-2 mega-form" action="{{ route('size.store') }}"
                                        method="POST">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Size
                                                Name</label>
                                            <div class="col-sm-9">
                                                <input class="" type="text" id="size" placeholder="Size Name"
                                                    name="size_name">
                                                @error('size_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0"></label>
                                            <div class="col-sm-9">
                                                <button class="btn theme-bg-color text-white">Add New Size</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New Product Add End -->
@endsection
@section('footer_script')
    <script>
        $("#color").selectize({
            delimiter: ",",
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input,
                };
            },
        });
    </script>

    <script>
        $("#size").selectize({
            delimiter: ",",
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input,
                };
            },
        });
    </script>
@endsection
