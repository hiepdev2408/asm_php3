@extends('Backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thêm danh mục</h4>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $model->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="live-preview d-flex gap-3">
                            <div class="row gy-6 w-50">
                                <div class="row-12 ">
                                    <div class="col-xxl-6 col-md-6 w-100">
                                        <div>
                                            <label for="basiInput" class="form-label">Tên danh mục</label>
                                            <input type="text" name="name" value="{{ $model->name }}" class="form-control">
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-xxl-6 col-md-6 mt-3 w-100">
                                        <div>
                                            <h6 class="fw-semibold">Danh mục</h6>
                                            <select class="js-example-basic-single" name="parent_id">
                                                <option value="{{ $model->parent?->id }}">{{ $model->parent?->name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-md-6 mt-3 w-100">
                                        <div>
                                            <label for="labelInput" class="form-label">Hình ảnh</label>
                                            <input type="file" name="image" class="form-control">
                                            <img src="{{ Storage::url($model->image) }}" width="100px" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-6 w-50">
                                <div class="row-12">
                                    <div class="col-xxl-6 col-md-6">
                                        <div class="form-check form-switch form-switch-secondary ms-5">
                                            <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                            @checked($model->is_active)
                                            value="1" >
                                            <label class="form-check-label" for="SwitchCheck2">Trạng thái</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Sửa danh mục</button>
                        <button type="submit" class="btn btn-success mt-3"><a href="{{ route('admin.category.index') }}" class="text-white">Quay lại</a></button>
                    </form>

                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
@section('style-libs')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('script-libs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('admins/velzon/assets/js/pages/select2.init.js') }}"></script>
@endsection
