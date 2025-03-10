<div class="row m-0 p-0 justify-content-center">
    <div class="col-lg-8 col-xl-6 m-0 p-0 py-5">
        <h4 class="fw-bold">{{ $dosen->dosen_nama }}</h4>
        <hr>
        <h5 class="m-0">Konsentrasi dan Keahlian</h5>
        <hr>
        <form action="{{ url('admin-simpan-dosen/step-2') }}" method="post">
            @csrf
            <input type="hidden" name="dosen_id" value="{{ $dosen->dosen_id }}">
            <div class="mb-3 row m-0 p-0">
                <div class="col-md-6 m-0 p-0 pe-0 pe-md-1">
                    <label for="dosen_konsentrasi_ID">Konsentrasi <i class="lang-id"></i></label>
                    <input name="dosen_konsentrasi_ID" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="dosen_konsentrasi_ID"
                    value="{{ old('dosen_konsentrasi_ID') }}">
                </div>
                <div class="col-md-6 m-0 p-0 ps-0 ps-md-1">
                <label for="dosen_konsentrasi_EN">Konsentrasi <i class="lang-en"></i></label>
                    <input name="dosen_konsentrasi_EN" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="dosen_konsentrasi_EN"
                    value="{{ old('dosen_konsentrasi_EN') }}">
                </div>
                <div class="col-md-6 m-0 p-0 pe-0 pe-md-1">
                    @error('dosen_konsentrasi_ID')
                    <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 m-0 p-0 ps-0 ps-md-1">
                    @error('dosen_konsentrasi_EN')
                    <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row m-0 p-0">
                <div class="col-md-6 m-0 p-0 pe-0 pe-md-1">
                    <label for="dosen_keahlian_ID">Keahlian (SK Dekan) <i class="lang-id"></i></label>
                    <input name="dosen_keahlian_ID" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="dosen_keahlian_ID"
                    value="{{ old('dosen_keahlian_ID') }}">
                </div>
                <div class="col-md-6 m-0 p-0 ps-0 ps-md-1">
                <label for="dosen_keahlian_EN">Keahlian (SK Dekan) <i class="lang-en"></i></label>
                    <input name="dosen_keahlian_EN" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="dosen_keahlian_EN"
                    value="{{ old('dosen_keahlian_EN') }}">
                </div>
                <div class="col-md-6 m-0 p-0 pe-0 pe-md-1">
                    @error('dosen_keahlian_ID')
                    <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 m-0 p-0 ps-0 ps-md-1">
                    @error('dosen_keahlian_EN')
                    <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <hr>
            <h5 class="m-0">Akun</h5>
            <hr>
            <div class="mb-3">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/static/logo/scholar.png') }}" class="rounded-circle shadow-l-2 he-16 mb-1 position-absolute">
                    <label for="dosen_scholar" class="ms-4">URL Google Scholar</label>
                </div>
                <input name="dosen_scholar" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="http://" id="dosen_scholar" autocomplete="off"
                value="{{ old('dosen_scholar') }}">
                @error('dosen_scholar')
                <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/static/logo/orcid.png') }}" class="rounded-circle shadow-l-2 he-16 mb-1 position-absolute">
                    <label for="dosen_orcid" class="ms-4">URL Orcid ID</label>
                </div>
                <input name="dosen_orcid" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="http://" id="dosen_orcid" autocomplete="off"
                value="{{ old('dosen_orcid') }}">
                @error('dosen_orcid')
                <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/static/logo/scopus.png') }}" class="rounded-circle shadow-l-2 he-16 mb-1 position-absolute">
                    <label for="dosen_scopus" class="ms-4">URL Scopus ID</label>
                </div>
                <input name="dosen_scopus" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="http://" id="dosen_scopus" autocomplete="off"
                value="{{ old('dosen_scopus') }}">
                @error('dosen_scopus')
                <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/static/logo/sinta.png') }}" class="rounded-circle shadow-l-2 he-16 mb-1 position-absolute">
                    <label for="dosen_sinta" class="ms-4">URL Sinta ID</label>
                </div>
                <input name="dosen_sinta" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="http://" id="dosen_sinta" autocomplete="off"
                value="{{ old('dosen_sinta') }}">
                @error('dosen_sinta')
                <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
            </div>
            <hr>
            <h5 class="m-0">Riwayat Pendidikan</h5>
            <hr>
            <div class="mb-3">
                <label for="dosen_s1">S1</label>
                <input name="dosen_s1" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="dosen_s1" autocomplete="off"
                value="{{ old('dosen_s1') }}">
                @error('dosen_s1')
                <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="dosen_s2">S2</label>
                <input name="dosen_s2" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="dosen_s2" autocomplete="off"
                value="{{ old('dosen_s2') }}">
                @error('dosen_s2')
                <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="dosen_s3">S3</label>
                <input name="dosen_s3" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="dosen_s3" autocomplete="off"
                value="{{ old('dosen_s3') }}">
                @error('dosen_s3')
                <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
            </div>
            <hr>
            <div class="d-flex mt-4">
                <button type="submit" class="btn btn-outline-clr3 btn-sm">Simpan</button>
                <a href="{{ url('admin-tambah-dosen/step-3/' .$dosen->dosen_id) }}" class="btn btn-outline-danger btn-sm ms-2">Lewati</a>
            </div>
        </form>
    </div>
</div>