<!-- Modal Untuk Tambah Data -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <form class="col-lg-12" action="{{ route('data.store' ) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="desa_id" class="form-label fw-bold">Desa</label>
                    <select class="form-control" aria-label="Default select example" name="desa_id" id="desa_id">
                        <option selected>-- Pilih Desa --</option>
                        @foreach ($desa as $d => $row)
                        <option value="{{ $row->id }}">{{ $row->title }}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sample" class="form-label fw-bold">Nama Sample</label>
                    <input type="text" class="form-control" id="sample" name="sample" placeholder="Masukkan Nama Sample...">
                </div>
                <div class="mb-3">
                    <label for="clus_hasil_id" class="form-label fw-bold">Cluster</label>
                    <select class="form-control" aria-label="Default select example" name="clus_hasil_id" id="clus_hasil_id">
                        <option selected>-- Pilih Cluster --</option>
                        @foreach ($cluster as $c => $row)
                        <option value="{{ $row->id }}">{{ $row->name }} - {{ $row->detail }}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ph_air" class="form-label fw-bold">Ph Air</label>
                    <input type="number" class="form-control" id="ph_air" name="ph_air" placeholder="Masukkan Ph Air...">
                </div>
                <div class="mb-3">
                    <label for="ph_tanah" class="form-label fw-bold">Ph Tanah</label>
                    <input type="number" class="form-control" id="ph_tanah" name="ph_tanah" placeholder="Masukkan Ph Tanah...">
                </div>
                <div class="mb-3">
                    <label for="suhu" class="form-label fw-bold">Suhu</label>
                    <input type="number" class="form-control" id="suhu" name="suhu" placeholder="Masukkan Janjang Panen...">
                </div>
                <div class="mb-3">
                    <label for="latitude" class="form-label fw-bold">Latitude</label>
                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Masukkan Latitude...">
                </div>
                <div class="mb-3">
                    <label for="longitude" class="form-label fw-bold">Longitude</label>
                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Masukkan Longitude...">
                </div>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i>&nbspClose</button>
                    <button type="submit" class="btn btn-success"><i class="bi bi-file-earmark-plus"></i>&nbspSubmit</button>
                </div>
            </form>
    </div>
    </div>
</div>