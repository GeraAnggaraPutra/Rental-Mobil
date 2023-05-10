<!-- Modal -->
<div class="modal fade" id="topup" tabindex="-1" role="dialog" aria-labelledby="topupLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topupLabel">Isi Saldo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action={{ route('topupadmin.store') }} method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_user">User</label>
                        <select name="id_user" class="form-select @error('id_user') is-invalid @enderror" id="id_user">
                            <option value="" hidden>Pilih User</option>
                            @foreach ($users as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                        @error('id_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nominal">Masukkan Jumlah(Rp)</label>
                        <input type="number" class="form-control @error('jumlah_saldo') is-invalid @enderror"
                            id="nominal" name="jumlah_saldo" aria-describedby="nominal"
                            placeholder="Masukkan nominal yang akan diisi" value="{{ old('jumlah_saldo') }}">
                        <small id="nominal" class="form-text text-muted">Silahkan masukkan nominal yang valid</small>
                        @error('jumlah_saldo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="metode">Pilih Metode Pembayaran</label>
                        <select name="metode_pembayaran"
                            class="form-select @error('metode_pembayaran') is-invalid @enderror">
                            <option value="" hidden>Pilih Metode Pembayaran</option>
                            <option value="M-banking">M-banking</option>
                            <option value="Dana">Dana</option>
                            <option value="Gopay">Gopay</option>
                            <option value="Ovo">Ovo</option>
                        </select>
                        @error('metode_pembayaran')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Process</button>
                </div>
            </form>
        </div>
    </div>
</div>
