@extends('Fontend.layouts.masterauth')

@section('title-auth')
    Register | Website-news
@endsection
@section('content-auth')
    <div class="container d-flex justify-content-around align-items-center my-5">
        <!-- Form đăng nhập -->
        <div class="login-form mr-4" style="width: 40%;">
            <h5 class="text-center font-weight-bold mb-3">Login</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('client.auth.login') }}" method="post" id="loginForm">
                @csrf
                <div class="form-group mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" style="height: 50px">
                    <span class="text-danger" id="emailError"></span>
                </div>
                <div class="form-group mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" style="height: 50px">
                    <span class="text-danger" id="passwordError"></span>
                </div>
                <button type="submit" class="btn btn-dark btn-block"
                    style="font-size: 17px; font-family: 'Montserrat', sans-serif; line-height: 2.3; border-top-left-radius: 25px; border-bottom-right-radius: 20px;">Đăng
                    Nhập</button>
            </form>
        </div>
        <!-- Bulkhead: Vách Ngăn -->
        <div class="bulkhead bg-dark" style="width: 1px; height: 300px; opacity: 0.3;"></div>
        <!-- Btn đăng kí -->
        <div class="register-section ml-4 text-center" style="max-width: 50%;">
            <h1 class="display-4 fw-medium" style="font-size: 30px;font-family:'Montserrat' ">Khách hàng mới của Website - news </h1>
            <p class="lead mx-auto" style="font-family: 'Montserrat';font-size: 17px;width: 500px;">Nếu bạn chưa có tài khoản trên Website - news , hãy sử dụng tùy chọn này để truy cập biểu mẫu đăng ký.
                Bằng cách cung cấp cho Website - news  thông tin chi tiết của bạn, quá trình mua hàng trên Website - news  sẽ là một trải
                nghiệm thú vị và nhanh chóng hơn!</p>
            <a href="{{ route('client.auth.register') }}" class="btn btn-dark btn-lg"
                style="font-size: 20px; width: 180px; font-family: 'Montserrat', sans-serif; line-height: 2.3; border-top-left-radius: 25px; border-bottom-right-radius: 20px;">Đăng
                Kí</a>
        </div>
    </div>
@endsection
