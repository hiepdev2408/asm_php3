@extends('Backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thêm bài viết</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.post.update', $model->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="live-preview d-flex gap-3">
                            <div class="row gy-6 w-50">
                                <div class="row-12 ">
                                    <div class="col-xxl-6 col-md-6 w-100">
                                        <div>
                                            <label for="basiInput" class="form-label">Tên bài viết</label>
                                            <input type="text" name="name" value="{{ $model->name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    {{-- @dd($model->category_id) --}}
                                    <div class="col-xxl-6 col-md-6 mt-3 w-100">
                                        <div>
                                            <h6 class="fw-semibold">Danh mục</h6>
                                            <select class="js-example-basic-single" name="category_id">
                                                @foreach ($category as $id => $name)
                                                    @if ($id == $model->category_id)
                                                        <option value="{{ $id }}" selected>{{ $name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $id }}">{{ $name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-md-6 mt-3 w-100">
                                        <div>
                                            <label for="labelInput" class="form-label">Hình ảnh</label>
                                            <input type="file" name="image" class="form-control">
                                            @isset($model->image)
                                                <img src="{{ Storage::url($model->image) }}" width="100px" alt="">
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6 mt-3 w-100">
                                        <div>
                                            <label for="labelInput" class="form-label">Tiêu đề</label>
                                            <input type="text" name="title" value="{{ $model->title }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6 mt-3 w-100">
                                        <div>
                                            <label for="labelInput" class="form-label">Nội dung</label>
                                            <textarea class="form-control" name="content" id="content">{{ $model->content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-6 w-50 mt-4">
                                <div class="row-12">
                                    <div class="col-xxl-6 col-md-6">
                                        <div class="form-check form-switch form-switch-secondary ms-5">
                                            <input class="form-check-input" type="checkbox" role="switch" name="is_active"
                                                value="1" @checked($model->is_active)>
                                            <label class="form-check-label" for="SwitchCheck2">Is active</label>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6">
                                        <div class="form-check form-switch form-switch-danger ms-5">
                                            <input class="form-check-input" type="checkbox" role="switch" name="is_hot"
                                                value="1" @checked($model->is_hot)>
                                            <label class="form-check-label" for="SwitchCheck2">Is hot</label>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6">
                                        <div class="form-check form-switch form-switch-success ms-5">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="is_show_home" value="1" @checked($model->is_show_home)>
                                            <label class="form-check-label" for="SwitchCheck2">Is show home</label>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6">
                                        <div class="form-check form-switch form-switch-warning ms-5">
                                            <input class="form-check-input" type="checkbox" role="switch" name="is_new"
                                                value="1" @checked($model->is_new)>
                                            <label class="form-check-label" for="SwitchCheck2">Is new</label>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-md-6 mt-3 w-100">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Tags</h4>
                                                </div><!-- end card header -->
                                                <div class="card-body">
                                                    <div class="live-preview">
                                                        <div class="row gy-4">
                                                            <div>
                                                                <select class="form-control" name="tags[]" id="tags"
                                                                    multiple>
                                                                    {{-- multiple sử dụng để chọn nhiều tags --}}

                                                                    @php($postTags = $model->tags->pluck('id')->all())
                                                                    @foreach ($tags as $id => $name)
                                                                        <option @selected(in_array($id, $postTags)) value="{{ $id }}">{{ $name }}</option>
                                                                        {{--
                                                                            in_array($id, $postTags): Kiểm tra xem id(tags) có nằm trong $postTags hay không
                                                                        --}}
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success mt-3">Sửa bài viết</button>
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
