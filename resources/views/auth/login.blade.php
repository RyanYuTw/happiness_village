@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{url('/')}}" class="app-brand-link gap-2">
                                <img src="{{ asset('assets/img/logo/logo_480x480.jpg') }}" alt="Logo" style="width: 25px">
                                <span class="app-brand-text demo text-body fw-bold">芯福里情緒教育推廣協會</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2" style="text-align: center">歡迎來到後台管理系統 ! 👋</h4>
                        <p class="mb-4" style="text-align: center">請輸入 郵件帳號或第三方社群帳號 進行系統登入</p>

                        <form id="formAuthentication" class="mb-3" action="{{url('/')}}" method="GET">
                            <div class="mb-3">
                                <label for="email" class="form-label">電子郵件帳號</label>
                                <input type="text" class="form-control" id="email" name="email-username" placeholder="請輸入電子郵件帳號" autofocus>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">密碼</label>
                                    <a href="{{url('auth/forgot-password-basic')}}">
                                        <small>忘記密碼?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me">
                                    <label class="form-check-label" for="remember-me">
                                        記得我
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">登入</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <a href="{{url('auth/register-basic')}}">
                                <span>建立帳號</span>
                            </a>
                        </p>
                    </div>
                    <div class="divider my-6">
                        <div class="divider-text">或</div>
                    </div>
                    <div class="d-flex justify-content-center" style="margin-bottom: 15px">
                        <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-facebook me-1_5">
                            <i class="bx bxl-facebook-circle" style="font-size: 26px"></i>
                        </a>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
{{--                        <i class="fa-brands fa-line"></i>--}}
                        <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-google">
                            <i class="tf-icons bx bxl-google" style="font-size: 26px"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
    </div>
@endsection
