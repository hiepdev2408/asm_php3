@extends('Backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thêm bài viết</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="live-preview d-flex gap-3">
                            <div class="row gy-6 w-50">
                                <div class="row-12 ">
                                    <div class="col-xxl-6 col-md-6 w-100">
                                        <div>
                                            <label for="basiInput" class="form-label">Tên bài viết</label>
                                            <input type="text" name="name" value="{{ $model->name }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-xxl-6 col-md-6 mt-3 w-100">
                                        <div>
                                            <div>
                                                <label for="basiInput" class="form-label">Danh mục</label>
                                                <input type="text" name="name" value="{{ $model->category->name }}" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6 mt-3 w-100">
                                        <div>
                                            <label for="basiInput" class="form-label">Người đăng</label>
                                            <input type="text" name="name" value="{{ $model->user->name }}" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-md-6 mt-3 w-100">
                                        <div>
                                            <label for="labelInput" class="form-label">Hình ảnh</label>
                                            <input type="file" name="image" class="form-control" disabled>
                                            <img src="{{ Storage::url($model->image) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6 mt-3 w-100">
                                        <div>
                                            <label for="labelInput" class="form-label">Tiêu đề</label>
                                            <input type="text" name="title" value="{{ $model->title }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6 mt-3 w-100">
                                        <div>
                                            <label for="labelInput" class="form-label">Nội dung</label>
                                            <textarea class="form-control" name="content" id="content" disabled>{{ $model->content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-6 w-50 mt-4">
                                <div class="row-12">
                                    <div class="col-xxl-6 col-md-6">
                                        <div class="form-check form-switch form-switch-secondary ms-5">
                                            <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                                @checked($model->is_active)
                                            value="1" >
                                            <label class="form-check-label" for="SwitchCheck2">Is active</label>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6">
                                        <div class="form-check form-switch form-switch-danger ms-5">
                                            <input class="form-check-input" type="checkbox" role="switch" name="is_hot"
                                                @checked($model->is_hot)
                                            value="1" >
                                            <label class="form-check-label" for="SwitchCheck2">Is hot</label>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6">
                                        <div class="form-check form-switch form-switch-success ms-5">
                                            <input class="form-check-input" type="checkbox" role="switch" name="is_show_home"
                                                @checked($model->is_show_home)
                                            value="1" >
                                            <label class="form-check-label" for="SwitchCheck2">Is show home</label>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6">
                                        <div class="form-check form-switch form-switch-warning ms-5">
                                            <input class="form-check-input" type="checkbox" role="switch" name="is_new"
                                                @checked($model->is_new)
                                            value="1" >
                                            <label class="form-check-label" for="SwitchCheck2">Is new</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <a href="{{ route('admin.post.index') }}" class="btn btn-primary mt-3">Quay lại</a>
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
    <script src="https:////cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection