@extends('Backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Chi tiết danh mục</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div>

                        <div data-simplebar style="height: 242px;" class="mx-n3">
                            <ul class="list list-group list-group-flush mb-0">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Trường</th>
                                            <th>Giá Trị</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($model->toArray() as $key => $value)
                                            <tr>
                                                <td>{{ $key }}</td>
                                                <td>
                                                    {{-- @dd($value); --}}
                                                    @php

                                                        if($key == 'image'){
                                                            $url = \Storage::url($value);
                                                            echo "<img src=\"$url\" width=\"100px\">";
                                                        }elseif (Str::contains($key, 'is_')) {
                                                            echo $value
                                                                    ? '<span class="badge text-bg-success">Hoạt động</span>'
                                                                    : '<span class="badge text-bg-secondary">Chờ duyệt</span>';
                                                        }else {
                                                            echo $value;
                                                        }
                                                    @endphp
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                            </ul>
                            <!-- end ul list -->
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->


    </div>
@endsection
