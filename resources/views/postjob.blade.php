@extends('layout')
@section('title', 'โพสต์งาน')
@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3">
                    @include('layout2')
                </div>
                <div class="col-lg-9">
                    @include('layout3')
                    <form action="" method="post" id="createJobForm" name="createJobForm">
                        <div class="card border-0 shadow mb-4 ">
                            <div class="card-body card-form p-4">
                                <h3 class="fs-4 mb-1">รายละเอียดงาน</h3>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="" class="mb-2">ชื่อ<span class="req">*</span></label>
                                        <input type="text" placeholder="" id="title" name="title"
                                            class="form-control">
                                        <p></p>
                                    </div>
                                    <div class="col-md-6  mb-4">
                                        <label for="" class="mb-2">เลือกหน้าที่งาน<span
                                                class="req">*</span></label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="">เลือกหน้าที่งาน</option>
                                            @if ($categories->isNotEmpty())
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <p></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="" class="mb-2">ระยะเวลางาน<span
                                                class="req">*</span></label>
                                        <select name="jobType" id="jobType" class="form-control">
                                            <option value="">ระยะเวลางาน</option>
                                            @if ($jobTypes->isNotEmpty())
                                                @foreach ($jobTypes as $jobType)
                                                    <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <p></p>
                                    </div>
                                    <div class="col-md-6  mb-4">
                                        <label for="" class="mb-2">ตำแหน่งว่าง<span
                                                class="req">*</span></label>
                                        <input type="number" min="1" placeholder="" id="vacancy" name="vacancy"
                                            class="form-control">
                                        <p></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label for="" class="mb-2">เงินเดือน</label>
                                        <input type="text" placeholder="" id="salary" name="salary"
                                            class="form-control">
                                        <p></p>
                                    </div>

                                    <div class="mb-4 col-md-6">
                                        <label for="" class="mb-2">สถานที่<span class="req">*</span></label>
                                        <input type="text" placeholder="" id="location" name="location"
                                            class="form-control">
                                        <p></p>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="" class="mb-2">คำอธิบายงาน<span class="req">*</span></label>
                                    <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder=""></textarea>
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">สวัสดิการ</label>
                                    <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder=""></textarea>
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">หน้าที่รับผิดชอบ</label>
                                    <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder=""></textarea>
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">คุณสมบัติ</label>
                                    <textarea class="form-control" name="qualifications" id="qualifications" cols="5" rows="5"
                                        placeholder=""></textarea>
                                    <p></p>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="" class="mb-2">ประสบการณ์การทำงาน<span
                                            class="req">*</span></label>
                                    <select name="experience" id="experience" class="form-control">
                                        <option value="1">1-3 ปี</option>
                                        <option value="2">3-5 ปี</option>
                                        <option value="3">5-10 ปี</option>
                                        <option value="4">10+ ปี</option>
                                    </select>
                                    <p></p>
                                </div>

                                <div class="mb-4">
                                    <label for="" class="mb-2">คำค้นหา<span class="req">*</span></label>
                                    <input type="text" placeholder="keywords" id="keywords" name="keywords"
                                        class="form-control">
                                    <p></p>
                                </div>

                                <h3 class="fs-4 mb-1 mt-5 border-top pt-5">รายละเอียดบริษัท</h3>

                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label for="" class="mb-2">ชื่อบริษัท<span
                                                class="req">*</span></label>
                                        <input type="text" placeholder="" id="company_name" name="company_name"
                                            class="form-control">
                                        <p></p>
                                    </div>

                                    <div class="mb-4 col-md-6">
                                        <label for="" class="mb-2">สถานที่</label>
                                        <input type="text" placeholder="" id="company_location" name="company_location"
                                            class="form-control">
                                        <p></p>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="" class="mb-2">เว็บไซต์</label>
                                    <input type="text" placeholder="" id="company_website" name="company_website"
                                        class="form-control">
                                    <p></p>
                                </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>

@endsection

@section('customJs')
    <script type="text/javascript">
        $("#createJobForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('savejob') }}',
                type: 'post',
                data: $("#createJobForm").serializeArray(),
                dataType: 'json',
                success: function(response) {

                    if (response.success == true) {

                        $("#title").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#category").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#jobType").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#vacancy").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#location").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#description").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        $("#company_name").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');

                        window.location.href = "{{ route('myJobs') }}";

                    } else {
                        var errors = response.errors;
                        if (errors.title) {
                            $("#title").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.title);
                        } else {
                            $("#title").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }
                        if (errors.category) {
                            $("#category").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.category);
                        } else {
                            $("#category").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }
                        if (errors.jobType) {
                            $("#jobType").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.jobType);
                        } else {
                            $("#jobType").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }
                        if (errors.vacancy) {
                            $("#vacancy").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.vacancy);
                        } else {
                            $("#vacancy").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }
                        if (errors.location) {
                            $("#location").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.location);
                        } else {
                            $("#location").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }
                        if (errors.description) {
                            $("#description").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.description);
                        } else {
                            $("#description").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }
                        if (errors.benefits) {
                            $("#benefits").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.benefits);
                        } else {
                            $("#benefits").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('');
                        }
                        if (errors.company_name) {
                            $("#company_name").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.company_name);
                        } else {
                            $("#company_name").removeClass('is-invalid')
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
