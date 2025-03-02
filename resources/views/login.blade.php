@extends('layout')
@section('title','เข้าสู่ระบบ')
@section('main')
<section>
    @if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{Session::get('success')}}</p>
    </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-denger">
        <p>{{Session::get('error')}}</p>
    </div>
    @endif
    <p class="container text-center fs-1">เข้าสู่ระบบ</p>
    
        <div class="container col-4">
        <form action="{{route('authenticate')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">อีเมล</label>
            <input type="email" value="{{old('email')}}"  name='email' class="form-control" id="email" placeholder="อีเมล">

            @error('email')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">รหัสผ่าน</label>
            <input type="password" name='password' class="form-control" id="password" placeholder="*******">

            @error('password')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
        </div>
    
        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">ยังไม่มีบัญชีหรอจ๊ะ?</li>
                <li class="breadcrumb-item"><a href="/register">สมัครสมาชิก</a></li>
            </ol>
        </nav>

        <div class="container text-center">
            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
        </div>
    </form>
</div>
</section>
@endsection
