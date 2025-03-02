@extends('layout')
@section('title', 'หน้าแรก')
@section('main')

    <section class="container py-5">
        <div class="d-flex justify-content-center">
            <div class="row g-4">
                <div class="col-sm">
                    <input type="text" class="form-control" placeholder="ค้นหางาน" aria-label="ค้นหางาน">
                </div>
                <div class="col-sm">
                    <input type="text" class="form-control" placeholder="ประเภทงาน" aria-label="ประเภทงาน">
                </div>
                <div class="col-sm">
                    <input type="text" class="form-control" placeholder="สถานที่" aria-label="สถานที่">
                </div>
                <div class="col-sm">
                    <button type="button" class="btn btn-primary">ค้นหางาน</button>
                </div>
            </div>
        </div>

        <hr>
        <div class="carousel-item active">
            <img src="assets/images/JOBBER .jpg" class="d-block w-100" alt="...">
            <hr>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col h-100">
                    <div class="card" style="width: 20rem;">
                        <img src="assets/images/987.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">WHIPFLASH EXPRESS จำกัด </h5>
                            <p class="card-text">Business Development Officer (Sale เปิด Franchise  พังงา, ระนอง, ชุมพร)</p>
                            <a href="/job_detail" class="btn btn-primary">รายละเอียด</a>
                        </div>
                    </div>
                </div>
                <div class="col h-100">
                    <div class="card" style="width: 20rem;">
                        <img src="assets/images/951.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">สภาอุตสาหกรรมแห่งโลกอนาคต ประเทศไทย</h5>
                            <p class="card-text"> เจ้าหน้าที่ฝ่ายต่างประเทศ งานราชการและส่วนกลาง (งานราชการ ) </p>
                            <a href="/job_detail" class="btn btn-primary">รายละเอียด</a>
                        </div>
                    </div>
                </div>
                <div class="col h-100">
                    <div class="card" style="width: 20rem;">
                        <img src="assets/images/999.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">บริษัท น้ำตาลเกษตรผล จำกัด</h5>
                            <p class="card-text"> งานบริหารจัดการฟาร์ม (งานฟาร์ม งานสัตวบาล งานอนุรักษ์), Farm Planning & Strategy Assistant Manager</p>
                            <a href="#" class="btn btn-primary">รายละเอียด</a>
                        </div>
                    </div>
                </div>
                <div class="col h-100">
                    <div class="card" style="width: 20rem;">
                        <img src="assets/images/777.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">บริษัท  ABC จำกัด (มหาชน)</h5>
                            <p class="card-text">งานจัดซื้อ งานสินค้าคงคลัง (งานการผลิต งานขนส่ง) ABC Packaging</p>
                            <a href="#" class="btn btn-primary">รายละเอียด</a>
                        </div>
                    </div>
                </div>
                <div class="col h-100">
                    <div class="card" style="width: 20rem;">
                        <img src="assets/images/dog.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
