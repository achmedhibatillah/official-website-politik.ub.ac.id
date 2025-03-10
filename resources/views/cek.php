<div class="mb-3 row m-0 p-0">
        <div class="col-md-6 m-0 p-0 pe-0 pe-md-1">
            <label for="dosen_konsentrasi_ID">Keahlian (SK Dekan) <i class="lang-id"></i></label>
            <input name="dosen_konsentrasi_ID" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="dosen_konsentrasi_ID"
            value="{{ old('dosen_konsentrasi_ID') }}">
        </div>
        <div class="col-md-6 m-0 p-0 ps-0 ps-md-1">
        <label for="dosen_konsentrasi_EN">Keahlian (SK Dekan) <i class="lang-en"></i></label>
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