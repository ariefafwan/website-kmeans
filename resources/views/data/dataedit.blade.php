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
                    <label for="editbulan" class="form-label fw-bold">Date</label>
                    <input type="date" class="form-control @if ($errors->has('bulan')) has-error @endif" id="editbulan" name="bulan" autofocus>
                    @error('bulan')
                        <span class="help-block text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ha_block" class="form-label fw-bold">Ha Block</label>
                    <input type="number" class="form-control @if ($errors->has('ha_block')) has-error @endif" id="editha_block" name="ha_block"
                        placeholder="Masukkan Ha Block...">
                    @error('ha_block')
                        <span class="help-block text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ffb_produksi_ton" class="form-label fw-bold">FFB Produksi Ton</label>
                    <input type="number" class="form-control @if ($errors->has('ffb_produksi_ton')) has-error @endif" id="editffb_produksi_ton" name="ffb_produksi_ton"
                        placeholder="Masukkan FFB Produksi Ton...">
                    @error('ffb_produksi_ton')
                        <span class="help-block text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="janjang_panen" class="form-label fw-bold">Janjang Panen</label>
                    <input type="number" class="form-control @if ($errors->has('janjang_panen')) has-error @endif" id="editjanjang_panen" name="janjang_panen"
                        placeholder="Masukkan Janjang Panen...">
                    @error('janjang_panen')
                        <span class="help-block text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="brondolan_kg" class="form-label fw-bold">Brondolan Kg</label>
                    <input type="number" class="form-control @if ($errors->has('brondolan_kg')) has-error @endif" id="editbrondolan_kg" name="brondolan_kg"
                        placeholder="Masukkan Brondolan Kg...">
                    @error('brondolan_kg')
                        <span class="help-block text-danger">{{ $message }}</span>
                    @enderror
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