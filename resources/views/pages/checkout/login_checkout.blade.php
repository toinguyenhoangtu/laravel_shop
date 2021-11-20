@extends('layout')
@section('content')

    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<span class="text-alert">' . $message . '</span>';
                            Session::put('message', null);
                        }
                        ?>
                        <h2>Đăng nhập với tài khoản của bạn</h2>
                        <form action="{{ URL::to('/login-customer') }}" method="post">
                            {{ @csrf_field() }}
                            <input type="email" name="username_customer" placeholder="Email" />
                            <input type="password" name="password_customer" placeholder="Mật khẩu" />
                            <span>
                                <input type="checkbox" class="checkbox">
                                Ghi nhớ đăng nhập
                            </span>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">Hoặc</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Đăng ký tài khoản mới</h2>
                        <form action="{{ URL::to('/add-customer') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="name" placeholder="Họ và tên" />
                            <input type="text" name="phone" placeholder="Số điện thoại" />
                            <input type="email" name="email" placeholder="Địa chỉ Email" />
                            <input type="password" name="password" placeholder="Mật khẩu" />
                            <button type="submit" class="btn btn-default">Đăng ký</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->
@endsection
