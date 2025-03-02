<div class="card border-0 shadow mb-4 p-3">
    <div class="s-body text-center mt-3">
        <img src="assets/images/dog.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
        <h5 class="mt-3 pb-0">{{Auth::user()->name}}</h5>
        <p class="text-muted mb-1 fs-6">{{Auth::user()->designation}}</p>
        <div class="d-flex justify-content-center mb-2">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"
                class="btn btn-primary">เปลี่ยนรูปโปรไฟล์</button>
        </div>
    </div>
</div>


