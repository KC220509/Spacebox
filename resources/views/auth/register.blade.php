
<x-my-layout>
    <x-slot name="linkcss">
        <link rel="stylesheet" href="{{ url('assets/css/auth/auth.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/auth/modal-notifications.css') }}">
    </x-slot>

    @include('components.header')
    <div class="wrapper flex-row">
        <div class="auth-form">
            <h2>Đăng ký tài khoản</h2>
            <form id="registerForm" action="{{ route('account.register.auth') }}" method="POST">
                @csrf
                <div class="input-box">
                    <input value="{{ old('username')}}" id="username" name="username" class="form-control" type="text" placeholder="Nhập tên người dùng" required>
                </div>
                @error('username')
                    <small id="usernameError" class="auth-error">{{ $message }}</small>
                @enderror

                <div class="input-box">
                    <input value="{{ old('email')}}" id="email" name="email" class="form-control" type="email" placeholder="Nhập email của bạn" required>
                </div>
                @error('email')
                    <small id="emailError" class="auth-error">{{ $message }}</small>
                @enderror
                
                <div class="input-box">
                    <input id="password" name="password" class="form-control" type="password" placeholder="Nhập mật khẩu" required>
                    <i class="fa-regular fa-eye"></i>
                </div>
                @error('password')
                    <small id="passwordError" class="auth-error">{{ $message }}</small>
                @enderror

                <div class="input-box">
                    <input id="password_confirmation" name="password_confirmation" class="form-control" type="password" placeholder="Nhập lại mật khẩu" required>
                    <i class="fa-regular fa-eye"></i>
                </div>
                @error('password_confirmation')
                    <small id="repasswordError" class="auth-error">{{ $message }}</small>
                @enderror

                <div class="button-box">
                    <input type="Submit" value="Đăng Ký">
                </div>
                <div class="text">
                    <h3>Đã có tài khoản? <a href="{{ route('account.login') }}">Đăng nhập ngay</a></h3>
                </div>
            </form>
        </div>
        <div class="content-demo">
            <img src="{{ url('assets/images/demo.jpg') }}" alt="">
        </div>
    </div>

    @if (session('success'))
        @include('auth.modal-success')
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usernameError').delay(3000).fadeOut();
            $('#emailError').delay(3000).fadeOut();
            $('#passwordError').delay(3000).fadeOut();
            $('#repasswordError').delay(3000).fadeOut();
        });
    </script>
</x-my-layout>