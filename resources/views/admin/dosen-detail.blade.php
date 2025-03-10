<div class="my-2">
    <div class="d-flex align-items-end mb-4">
        <div class="d-flex align-items-center justify-content-center overflow-hidden bg-clr4 rounded shadow-m-2" style="width:70px;aspect-ratio:3/4;">
            <img src="{{ asset($dosen->dosen_foto) }}" style="height:100%;width:100%;object-fit:cover;">
        </div>
        <div class="ms-3">
            <h4 class="fw-bold lh-1">{{ $dosen->dosen_nama }}</h4>
            <a href="#" data-bs-toggle="modal" data-bs-target="#modalFoto" class="text-clr1 td-hover fsz-12">Lihat foto dosen.</a>
        </div>
    </div>
    @include('templates/session')
    <div class="row m-0 p-0">
        <div class="col-md-6 m-0 p-3 border-clr3">
            <div class="">
                <table>
                    <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td class="ps-3">{{ $dosen->dosen_nomor }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td class="ps-3">{{ $dosen->dosen_email }}</td>
                    </tr>
                    <tr>
                        <td>Slug</td>
                        <td>:</td>
                        <td class="ps-3">{{ $dosen->dosen_slug }}</td>
                    </tr>
                </table>
            </div>
            <hr>
            <div class="m-0 p-0 col-md-8 col-lg-6 col-xl-4">
            <div class="mb-2">
                <a href="{{ url('admin-edit-dosen/' . $dosen->dosen_id) }}" class="d-block btn-outline-clr3 px-3 td-none text-center">edit profil umum</a>
            </div>
            <div class="mb-2">
                <a href="{{ url('admin-edit-profil-akademik-dosen/' . $dosen->dosen_id) }}" class="d-block btn-outline-clr3 px-3 td-none text-center">edit profil akademik</a>
            </div>
            <div class="mb-2">
                <a href="{{ url('admin-edit-fokus-riset-dosen/' . $dosen->dosen_id) }}" class="d-block btn-outline-clr3 px-3 td-none text-center">edit fokus riset</a>
            </div>
            <div class="mb-2">
                <a href="{{ url('admin-atur-mata-kuliah-dosen/' . $dosen->dosen_id) }}" class="d-block btn-outline-clr3 px-3 td-none text-center">atur mata kuliah</a>
            </div>
            <div class="mb-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalDelete" class="d-block btn-outline-clr1 px-3 td-none text-center">hapus dosen</a>
            </div>
            </div>
        </div>
        <div class="col-md-6 m-0 p-3 border-clr3">
            <table>
                <tr>
                    <td class="align-top">Konsentrasi</td>
                    <td class="align-top">:</td>
                    <td class="ps-3">
                        <div class="">
                            <i class="lang-id me-2"></i>{{ $dosen->dosen_konsentrasi_ID }}
                        </div>
                        <div class="">
                            <i class="lang-en me-2"></i>{{ $dosen->dosen_konsentrasi_EN }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="align-top">Keahlian (SK Dekan)</td>
                    <td class="align-top">:</td>
                    <td class="ps-3">
                        <div class="">
                            <i class="lang-id me-2"></i>{{ $dosen->dosen_keahlian_ID }}
                        </div>
                        <div class="">
                            <i class="lang-en me-2"></i>{{ $dosen->dosen_keahlian_EN }}
                        </div>
                    </td>
                </tr>
            </table>
            <hr>
            <div class="">
                <p>Akun</p>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/images/static/logo/scholar.png') }}" class="he-18 rounded-circle shadow-m-2">
                    @if($dosen->dosen_scholar !== null)
                    <p class="m-0 ms-2"><a href="{{ $dosen->dosen_scholar }}" target="_blank" class="text-clr1 td-hover">Google Scholar</a></p>
                    @else
                    <p class="m-0 ms-2 text-secondary">Google Scholar</p>
                    @endif
                </div>
                <div class="d-flex align-items-center mt-2">
                    <img src="{{ asset('assets/images/static/logo/orcid.png') }}" class="he-18 rounded-circle shadow-m-2">
                    @if($dosen->dosen_orcid !== null)
                    <p class="m-0 ms-2"><a href="{{ $dosen->dosen_orcid }}" target="_blank" class="text-clr1 td-hover">Orcid ID</a></p>
                    @else
                    <p class="m-0 ms-2 text-secondary">Orcid ID</p>
                    @endif
                </div>
                <div class="d-flex align-items-center mt-2">
                    <img src="{{ asset('assets/images/static/logo/scopus.png') }}" class="he-18 rounded-circle shadow-m-2">
                    @if($dosen->dosen_scopus !== null)
                    <p class="m-0 ms-2"><a href="{{ $dosen->dosen_scopus }}" target="_blank" class="text-clr1 td-hover">Scopus ID</a></p>
                    @else
                    <p class="m-0 ms-2 text-secondary">Scopus ID</p>
                    @endif
                </div>
                <div class="d-flex align-items-center mt-2">
                    <img src="{{ asset('assets/images/static/logo/sinta.png') }}" class="he-18 rounded-circle shadow-m-2">
                    @if($dosen->dosen_sinta !== null)
                    <p class="m-0 ms-2"><a href="{{ $dosen->dosen_sinta }}" target="_blank" class="text-clr1 td-hover">Sinta ID</a></p>
                    @else
                    <p class="m-0 ms-2 text-secondary">Sinta ID</p>
                    @endif
                </div>
            </div>
            <hr>
            <div class="">
                <p>Riwayat Akademik</p>
                <div class="">
                    <table>
                        <tr>
                            <td>S1</td>
                            <td>:</td>
                            <td class="ps-2">{{ $dosen->dosen_s1 }}</td>
                        </tr>
                        <tr>
                            <td>S2</td>
                            <td>:</td>
                            <td class="ps-2">{{ $dosen->dosen_s2 }}</td>
                        </tr>
                        <tr>
                            <td>S3</td>
                            <td>:</td>
                            <td class="ps-2">{{ $dosen->dosen_s3 }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr>
            <p class="">Fokus Riset :</p>
            @if($dosen->fr->isNotEmpty())
            @foreach($dosen->fr as $x)
                <div class="d-flex align-items-center my-2">
                    <i class="fas fa-lightbulb text-warning"></i>
                    <div class="ms-3">
                        <p class="m-0 fw-bold lh-1 mb-1"><a href="#" data-bs-toggle="modal" data-bs-target="#modalFr-{{ $x->fr_id }}" class="td-hover text-clr1">{{ $x->fr_fr_ID }}</a></p>
                        <p class="m-0 fsz-10 text-secondary">{{ $x->fr_fr_EN }}</p>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modalFr-{{ $x->fr_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <div class="my-2">
                                <h1 class="modal-title fs-5 lh-1 mb-1" id="">{{ $x->fr_fr_ID }}</h1>
                                <p class="m-0 text-secondary lh-1">{{ $x->fr_fr_EN }}</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Deskripsi</p>
                            <div class="d-flex">
                                <div><div class="lang-id me-3"></div></div>
                                <p class="m-0">{{ $x->fr_deskripsi_ID }}</p>
                            </div>
                            <div class="d-flex mt-3">
                                <div><div class="lang-en me-3"></div></div>
                                <p class="m-0">{{ $x->fr_deskripsi_EN }}</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <p class="mt-2">Tidak ada fokus riset.</p>
            @endif
        </div>
    </div>
    <div class="row m-0 p-0 mt-4">
        <h5>Deskripsi Dosen</h5>
        <div class="col-md-6 m-0 p-3 border-clr3 d-flex">
            <p class="m-0 mb-1"><i class="lang-id"></i></p>
            <p class="m-0 ms-3 text-secondary">{{ $dosen->dosen_deskripsi_ID }}</p>
        </div>
        <div class="col-md-6 m-0 p-3 border-clr3 d-flex">
            <p class="m-0 mb-1"><i class="lang-en"></i></p>
            <p class="m-0 ms-3 text-secondary">{{ $dosen->dosen_deskripsi_EN }}</p>
        </div>
    </div>
    <div class="mt-4">
        <h5 class="ms-3">Mata Kuliah</h5>
        @if($dosen->mk->isNotEmpty())
        <table class="table">
            <thead class="table-danger">
                <tr>
                    <th>No.</th>
                    <th>Kode MK</th>
                    <th>Mata Kuliah</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">Semester</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($dosen->mk as $x)
                    <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $x->mk_id }}</td>
                    <td><a class="m-0 td-none fw-bold" href="{{ url('admin-mata-kuliah/' . $x->mk_id) }}">{{ $x->mk_mk_ID }}</a><p class="m-0 fsz-10 text-secondary">{{ $x->mk_mk_EN }}</p></td>
                    <td class="text-center">{{ $x->mk_sks }}</td>
                    <td class="text-center">{{ $x->mk_semester }}</td>
                    <td class="text-end">
                        <a href="{{ url('admin-mata-kuliah/' . $x->mk_id) }}" class="btn btn-success btn-sm fsz-10 mt-1" style="width:55px;"><i class="fas fa-eye"></i> lihat</a>
                    </td>
                    </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="ms-3">Tidak ada mata kuliah yang diampu.</p>
        @endif
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <div class="my-2">
                <h1 class="modal-title fs-5 lh-1 mb-1" id="">{{ $dosen->dosen_nama }}</h1>
                <p class="m-0 text-secondary lh-1">{{ $dosen->dosen_nomor }}</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="w-100 d-flex justify-content-center align-items-center overflow-hidden bg-clr4" style="aspect-ratio:3/4;">
                <img src="{{ asset($dosen->dosen_foto) }}" style="height:100%;width:100%;object-fit:cover;">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <div class="my-2">
                <h1 class="modal-title fs-5 lh-1 mb-1" id="">{{ $dosen->dosen_nama }}</h1>
                <p class="m-0 text-secondary lh-1">{{ $dosen->dosen_nomor }}</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Apakah Anda yakin ingin menghapus data dosen ini?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <a href="{{ url('admin-hapus-dosen/' . $dosen->dosen_id) }}" class="btn btn-danger">Hapus</a>
        </div>
        </div>
    </div>
</div>