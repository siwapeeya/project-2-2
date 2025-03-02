@extends('layout')
@section('title', 'ประวัติส่วนตัว')
@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3">
                    @include('layout2')
                </div>

                <div class="col-lg-9">
                    @include('layout3')
                    <div class="card border-0 shadow mb-4">
                        <form id="userForm" method="post" action="{{ route('profile') }}">
                            @csrf
                            <div class="card-body  p-4">
                                <h3 class="fs-4 mb-1">ประวัติส่วนตัว</h3>
                                <div class="mb-4">
                                    <label for="" class="mb-2">ชื่อ</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $user->name }}">
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">อีเมล</label>
                                    <input type="text" name="email" id="email"class="form-control"
                                        value="{{ $user->email }}">
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">ตำแหน่ง</label>
                                    <input type="text" name="designation" id="designation"class="form-control"
                                        value="{{ $user->designation }}">
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">เบอร์โทร</label>
                                    <input type="text" name="phone" id="phone"class="form-control"
                                        value="{{ $user->phone }}">
                                    <p></p>
                                </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                            </div>
                        </form>
                    </div>

                    <div class="card border-0 shadow mb-4">
                        <div class="card-body p-4">
                            <h3 class="fs-4 mb-1">ต้องการเปลี่ยนรหัสผ่านใหม่</h3>
                            <div class="mb-4">
                                <label for="" class="mb-2">รหัสผ่านเดิม</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">รหัสผ่านใหม่</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">ยืนยันรหัสใหม่</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer  p-4">
                            <button type="submit" class="btn btn-primary">ยืนยัน</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('customJs')
    <script type="text/javascript">
        $("#userForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('updateProfile') }}',
                type: 'put',
                data: $("#userForm").serializeArray(),
                dataType: 'json',
                success: function(response) {

                    if (response.success == true) {

                        $("#name").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#email").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        window.location.href="{{route('profile')}}";

                    } else {
                        var errors = response.errors;
                        if (errors.name) {
                            $("#name").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.name);
                        } else {
                            $("#name").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }
                        if (errors.email) {
                            $("#email").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.email);
                        } else {
                            $("#email").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }
                    }

                }

            });
        });
    </script>
@endsection
