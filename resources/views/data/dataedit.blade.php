<!-- Modal Add Data -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <form class="col-lg-12" action="{{ route('data.update') }}" method="post">
                @csrf
                <input type="hidden" class="form-control" id="editid" name="id">
                <div class="mb-3">
                    <label for="editdesa_id" class="form-label fw-bold">Desa</label>
                    <select class="form-control" aria-label="Default select example" name="desa_id" id="editdesa_id">
                        <option selected>-- Pilih Desa --</option>
                        @foreach ($desa as $d => $row)
                        <option value="{{ $row->id }}">{{ $row->title }}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="editluas_tanah" class="form-label fw-bold">Luas Tanah</label>
                    <input type="number" step="any" class="form-control" id="editluas_tanah" name="luas_tanah" placeholder="Masukkan Luas Tanah...">
                </div>
                <div class="mb-3">
                    <label for="editclus_hasil" class="form-label fw-bold">Cluster</label>
                    <select class="form-control" aria-label="Default select example" name="clus_hasil" id="editclus_hasil">
                        <option selected>-- Pilih Cluster --</option>
                        <option value="C1">C1 - Sangat Baik</option> 
                        <option value="C2">C2 - Baik</option> 
                        <option value="C3">C3 - Kurang Baik</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="editph_air" class="form-label fw-bold">Ph Air</label>
                    <input type="number" step="any" class="form-control" id="editph_air" name="ph_air" placeholder="Masukkan Ph Air...">
                </div>
                <div class="mb-3">
                    <label for="editph_tanah" class="form-label fw-bold">Ph Tanah</label>
                    <input type="number" step="any" class="form-control" id="editph_tanah" name="ph_tanah" placeholder="Masukkan Ph Tanah...">
                </div>
                <div class="mb-3">
                    <label for="editsuhu" class="form-label fw-bold">Suhu</label>
                    <input type="number" step="any" class="form-control" id="editsuhu" name="suhu" placeholder="Masukkan Suhu...">
                </div>
                <div class="mb-3">
                    <label for="editcurah_hujan" class="form-label fw-bold">Curah Hujan</label>
                    <input type="number" step="any" class="form-control" id="editcurah_hujan" name="curah_hujan" placeholder="Masukkan Curah Hujan...">
                </div>
                <div class="mb-3">
                    <label for="editlatitude" class="form-label fw-bold">Latitude</label>
                    <input type="text" step="any" class="form-control" id="editlatitude" name="latitude" placeholder="Masukkan Latitude...">
                </div>
                <div class="mb-3">
                    <label for="editlongitude" class="form-label fw-bold">Longitude</label>
                    <input type="text" class="form-control" id="editlongitude" name="longitude" placeholder="Masukkan Longitude...">
                </div>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i>&nbspClose</button>
                    <button type="submit" class="btn btn-info"><i class="bi bi-file-earmark-plus"></i>&nbspSave</button>
                </div>
            </form>
    </div>
    </div>
</div>