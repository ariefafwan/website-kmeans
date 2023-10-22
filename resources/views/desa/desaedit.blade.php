<!-- Modal Add Data -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <form class="col-lg-12" action="{{ route('desa.update') }}" method="post">
                @csrf
                <input type="hidden" class="form-control" id="editid" name="id">
                <label for="edittitle" class="form-label fw-bold">Nama Desa</label>
                    <input type="text" class="form-control" id="edittitle" name="title" placeholder="Masukkan Nama Desa...">
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i>&nbspClose</button>
                    <button type="submit" class="btn btn-info"><i class="bi bi-file-earmark-plus"></i>&nbspSave</button>
                </div>
            </form>
    </div>
    </div>
</div>