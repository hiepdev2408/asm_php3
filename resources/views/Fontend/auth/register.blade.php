@extends('Fontend.layouts.masterauth')
@section('title-auth')
    Register | Website-news
@endsection
@section('content-auth')
    <form action="{{ route('client.auth.register') }}" method="post" class="form-control mx-auto " style="margin-top:100px;width: 500px; padding: 10px 40px;height: 500px;box-shadow: 5px 5px 10px #ccc;border: none;outline: none">
        @csrf
        <h4 class="text-center mt-4">Đăng ký</h4>
        <div class="mb-3">
            <label for="">Username</label><span class="text-danger">*</span>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="">Email</label><span class="text-danger">*</span>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="">Password</label><span class="text-danger">*</span>
            <input type="text" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Confirm Password</label><span class="text-danger">*</span>
            <input type="text" name="password_confirmation" class="form-control">
        </div>
        <button class="btn btn-success mb-3" style="background-color: black;border-end-end-radius: 20px;border-top-left-radius:20px;width: 420px;padding: 10px;font-size: 20px ">Đăng ký</button>
    </form>
@endsection
