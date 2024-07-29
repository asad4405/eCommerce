@extends('layouts.backend_master')
@section('content')
    <div class="page-body">

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="m-auto col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Banner Information</h5>
                                    </div>

                                    @if (session('banner-success'))
                                        <div class="alert alert-success">{{ session('banner-success') }}</div>
                                    @endif

                                    <form class="theme-form theme-form-2 mega-form" action="{{ route('update.banner', $banner->first()->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="mb-0 form-label-title col-sm-3">Banner Title</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="title" value="{{ $banner->first()->title }}">
                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="mb-0 form-label-title col-sm-3">Banner Offer (%) Off</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="offer_persentage" value="{{ $banner->first()->offer_persentage }}">
                                                @error('offer_persentage')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="mb-0 form-label-title col-sm-3">Banner Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="name" value="{{ $banner->first()->name }}">
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="mb-0 form-label-title col-sm-3">Short Detail</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="short_detail" value="{{ $banner->first()->short_detail }}">
                                                @error('short_detail')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="mb-0 form-label-title col-sm-3">Button Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="button_link" value="{{ $banner->first()->button_link }}">
                                                @error('button_link')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="mb-0 form-label-title col-sm-3">Photo</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="photo">
                                                @error('photo')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="mb-0 form-label-title col-sm-3"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-animation">Update Banner</button>
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
        <!-- New Product Add End -->
    </div>
@endsection

