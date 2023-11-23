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
                    <label for="luas_tanah" class="form-label fw-bold">Luas Tanah</label>
                    <input type="number" class="form-control" id="luas_tanah" name="luas_tanah" placeholder="Masukkan Luas Tanah...">
                </div>
                <div class="mb-3">
                    <label for="clus_hasil" class="form-label fw-bold">Cluster</label>
                    <select class="form-control" aria-label="Default select example" name="clus_hasil" id="clus_hasil">
                        <option selected>-- Pilih Cluster --</option>
                        <option value="C1">C1 - Sangat Baik</option> 
                        <option value="C2">C2 - Baik</option> 
                        <option value="C3">C3 - Kurang Baik</option>
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
                    <input type="number" class="form-control" id="suhu" name="suhu" placeholder="Masukkan Suhu...">
                </div>
                <div class="mb-3">
                    <label for="curah_hujan" class="form-label fw-bold">Curah Hujan</label>
                    <input type="number" class="form-control" id="curah_hujan" name="curah_hujan" placeholder="Masukkan Curah Hujan...">
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