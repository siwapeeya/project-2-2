@extends('layout')
@section('title', 'สมัครสมาชิก')
@section('main')
    <section>
        <p class="container text-center fs-1">สมัครสมาชิก</p>
        <form action="{{ route('processRegistration') }}" method="POST" name="registrationform" id="registrationform">
            @csrf
            <div class="container col-4">
                <div class="md-3">
                    <label for="name" class="form-label">ชื่อ</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="ป้อนชื่อ">
                    <p></p>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">อีเมล</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="ป้อนอีเมล">
                    <p></p>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="รหัสผ่าน">
                    <p></p>
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">ยืนยันรหัสผ่าน</label>
                    <input type="password" name="confirm-password" class="form-control" id="confirm-password"
                        placeholder="ยืนยันรหัสผ่าน">
                    <p></p>
                    <div class="container text-center">
                        <button class="btn btn-primary">สมัครสมาชิก</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('customJs')
    <script>
        $("#registrationform").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('processRegistration') }}',
                type: 'POST',
                data: $("#registrationform").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
                        if (errors.name) {
                            $("#name").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.name)
                        } else {
                            $("#name").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                        if (errors.email) {
                            $("#email").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.name)
                        } else {
                            $("#email").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.password) {
                            $("#password").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.password)
                        } else {
                            $("#password").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                        if (errors.confirm_password) {
                            $("#confirm-password").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.confirm_password)
                        } else {
                            $("#confirm-password").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                    } else {
                        $("#name").removeClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html('');
                        $("#email").removeClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html('');
                        $("#password").removeClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html('');
                        $("#confirm_password").removeClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback')
                            .html('');
                        window.location.href = '{{ route('login') }}';
                    }
                }
            });
        });
    </script>
@endsection
