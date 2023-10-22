<!-- Modal Add Data -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <form class="col-lg-12" action="{{ route('cluster.update') }}" method="post"  enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" id="editid" name="id">
                <div class="mb-3">
                    <label for="editname" class="form-label fw-bold">Nama Cluster</label>
                    <input type="text" class="form-control" id="editname" name="name" placeholder="Masukkan Nama Cluster...">
                </div>
                <div class="mb-3">
                    <label for="editdetail" class="form-label fw-bold">Keterangan</label>
                    <input type="text" class="form-control" id="editdetail" name="detail" placeholder="Masukkan Keterangan Cluster...">
                </div>
                {{-- <div class="mb-3">
                    <label for="marker" class="form-label fw-bold">Penanda (Marker)</label>
                    <input type="file" class="form-control" id="marker" name="marker">
                </div> --}}
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i>&nbspClose</button>
                    <button type="submit" class="btn btn-info"><i class="bi bi-file-earmark-plus"></i>&nbspSave</button>
                </div>
            </form>
    </div>
    </div>
</div>