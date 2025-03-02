<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #b1dbfa;">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">JOBBER</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="mb-2 ms-auto navbar-nav mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">สถานประกอบการ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ผู้สมัครงาน</a>
                        </li>
                        @if (!Auth::check())
                            <a class="btn btn-primary" href="{{ route('login') }}" role="button">เข้าสู่ระบบ</a>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile') }}">ประวัติส่วนตัว</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('main')

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pb-0" id="exampleModalLabel">เปลี่ยนรูปโปรไฟล์</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="profilePicForm" name="profilePicForm" action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">เลือกรูปโปรโฟล์</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <p class="text-denger" id="image-error"></p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mx-3">อัปเดต</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.bundle.5.1.3.min.js"></script>
        <script src="assets/js/instantpages.5.1.0.min.js"></script>
        <script src="assets/js/lazyload.17.6.0.min.js"></script>
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/lightbox.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#profilePicForm").submit(function(e){
                e.preventDefault();

                var formData = new FormData(this);


                $.ajax({
                url: '{{route("updateProfilePic")}}',
                type: 'post',
                data: formData,
                dataType: 'json',
                contentype: false,
                processData: false,
                success: function(response) {
                    if(response.status == false){
                        var errors =response.errors;
                        if(errors.image){
                            $("#image-error").html(errors.image)
                        }

                    }else(
                        window.location.href='{{url()->current()}}'
                    )
                }
                });
            });
        </script>
        @yield('customJs')

    </footer>

</body>

</html>
