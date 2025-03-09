<div class="row m-0 p-0 w-100">
    <div class="col-lg-5 m-0 p-0 pe-2">
        <div class="border-clr1 text-clr1 bg-clr5 m-0 p-3 shadow-">
            <h4>Tambah Dosen</h4>
            <hr>
            <form action="{{ url('admin-simpan-dosen') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="dosen_nama">Nama Lengkap</label>
                    <input name="dosen_nama" type="text" class="w-100 border-clr1 bg-clr5 px-2" placeholder="..." id="dosen_nama"
                    value="{{ old('dosen_nama') }}">
                    @error('dosen_nama')
                    <div class="ms-1 fsz-10 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="dosen_email">Alamat Email</label>
                    <input name="dosen_email" type="text" class="w-100 border-clr1 bg-clr5 px-2" placeholder="..." id="dosen_email"
                    value="{{ old('dosen_email') }}">
                    @error('dosen_email')
                    <div class="ms-1 fsz-10 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="dosen_deskripsi">Deskripsi</label>
                    <textarea name="dosen_deskripsi" type="text" class="w-100 border-clr1 bg-clr5 px-2 m-0" style="height:100px;" placeholder="..." id="dosen_deskripsi">{{ old('dosen_deskripsi') }}</textarea>
                    @error('dosen_deskripsi')
                    <div class="ms-1 fsz-10 mt-0"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jabatan_id">Jabatan Fungsional</label>
                    <select name="jabatan_id" id="jabatan_id" class="w-100 border-clr1 bg-clr5">
                        @foreach ($jabatan as $x)
                            <option value="{{ $x->jabatan_id }}">{{ $x->jabatan_jabatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fr_id_1">Fokus Riset 1</label>
                    <select name="fr_id_1" id="fr_id_1" class="w-100 border-clr1 bg-clr5">
                        @foreach ($fr as $x)
                            <option value="{{ $x->fr_id }}">{{ $x->fr_fr }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fr_id_2">Fokus Riset 2</label>
                    <select name="fr_id_2" id="fr_id_2" class="w-100 border-clr1 bg-clr5">
                        @foreach ($fr as $x)
                            <option value="{{ $x->fr_id }}">{{ $x->fr_fr }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="konsentrasi_id">Konsentrasi</label>
                    <select name="konsentrasi_id" id="konsentrasi_id" class="w-100 border-clr1 bg-clr5">
                        @foreach ($konsentrasi as $x)
                            <option value="{{ $x->konsentrasi_id }}">{{ $x->konsentrasi_konsentrasi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dosen_keahlian">Keahlian</label>
                    <input name="dosen_keahlian" type="text" class="w-100 border-clr1 bg-clr5 px-2" placeholder="..." id="dosen_keahlian"
                    value="{{ old('dosen_keahlian') }}">
                    @error('dosen_keahlian')
                    <div class="ms-1 fsz-10 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-outline-clr1 btn-sm mt-2" type="submit">Simpan</button>
            </form>
        </div>
    </div>
    <div class="col-lg-7 m-0 p-0 ps-2 text-clr1 mt-4 mt-lg-0">
        <h3>Daftar Dosen</h3>
        @if($dosen->isNotEmpty())
        @foreach($dosen as $x)
        {{ $x->dosen_nama }}
        @endforeach
        @else
        <p class="m-0">Data dosen belum ada.</p>
        @endif
    </div>
</div>