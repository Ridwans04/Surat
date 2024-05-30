<!-- table -->
<div class="card">
    <div class="card-header">
        <div class="demo-inline-spacing">
            <button class="btn btn-outline-success" onclick="get_data()">Refresh</button>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#exampleModalCenter">
                <i data-feather="plus"></i> Tambah Data
            </button>
            @include('content.master.role.create')
        </div>
    </div>
    <div class="card-body p-1">
        <h3>DATA ROLE</h3>
        <table class="datatables-basic table" id="user_role">
        </table>
        @include('content.master.role.edit')
    </div>
</div>
<!-- table -->
