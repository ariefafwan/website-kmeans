<!-- Modal Untuk Tambah Data -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <form class="col-lg-12" action="{{ route('cluster.store' ) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama Cluster</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Cluster...">
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label fw-bold">Keterangan</label>
                    <input type="text" class="form-control" id="detail" name="detail" placeholder="Masukkan Keterangan Cluster...">
                </div>
                {{-- <div class="mb-3">
                    <label for="marker" class="form-label fw-bold">Penanda (Marker)</label>
                    <input type="file" class="form-control" id="marker" name="marker">
                </div> --}}
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i>&nbspClose</button>
                    <button type="submit" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i>&nbspSubmit</button>
                </div>
            </form>
    </div>
    </div>
</div>