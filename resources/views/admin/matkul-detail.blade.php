<div class="text-clr3">
    <div class="row m-0 p-0">
        <div class="col-lg-6 m-0 p-0">
            <h5 class="m-0">{{ $mk->mk_id }}</h5>
            <h3 class="m-0 fw-bold">{{ $mk->mk_mk_ID }}</h3>
            <p>{{ $mk->mk_mk_EN }}</p>
        </div>
        <div class="col-lg-6 m-0 p-0 d-flex align-items-center">
            <div class="row m-0 p-0 d-flex mb-3">
                <div class="card bg-transparent border-clr3 text-clr3 m-1 p-3 d-flex justify-content-center" style="width:50px;height:40px;">
                    <div class="text-center">
                        <p class="m-0 fsz-10 lh-1">SKS</p>
                        <p class="m-0 lh-1">{{ $mk->mk_sks }}</p>
                    </div>
                </div>
                <div class="card bg-transparent border-clr3 text-clr3 m-1 p-3 d-flex justify-content-center" style="width:75px;height:40px;">
                    <div class="text-center">
                        <p class="m-0 fsz-10 lh-1">Semester</p>
                        <p class="m-0 lh-1">{{ $mk->mk_semester }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    @include('templates/session')
    <table>
        <tr>
            <td>Dibuat pada</td>
            <td>:</td>
            <td>{{ $mk->created_at }}</td>
        </tr>
        <tr>
            <td>Diedit pada</td>
            <td>:</td>
            <td>{{ ($mk->created_at == $mk->updated_at) ? 'Data belum pernah diedit.' : $mk->updated_at }}</td>
        </tr>
    </table>
    <div class="mt-2">
        <a href="#" data-bs-toggle="modal" data-bs-target="#modalAturDosen" class="btn btn-primary btn-sm lh-1 rounded m-0 mb-1 fsz-10" style="width:120px;"><i class="fas fa-cog"></i> atur dosen</a>
        <a href="{{ url('admin-edit-matkul/' . $mk->mk_id) }}" class="btn btn-warning btn-sm lh-1 rounded m-0 mb-1 fsz-10" style="width:120px;"><i class="fas fa-edit"></i> edit</a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#modalDel" class="btn btn-danger btn-sm lh-1 rounded m-0 mb-1 fsz-10" style="width:120px;"><i class="fas fa-trash"></i> hapus</a>
    </div>
    <hr>
    <div class="row m-0 p-0 mb-3">
        <div class="col-md-6 m-0 p-0">
            <h5>Kurikulum :</h5>
            @if($mk->kurikulum->isNotEmpty())
            @foreach($mk->kurikulum as $x)
            <div class="d-flex align-items-center"><i class="fas fa-check-circle me-3"></i><div class=""><p class="m-0">{{ $x->kurikulum_judul_ID }}</p><p class="m-0 fsz-10 text-secondary">{{ $x->kurikulum_judul_ID }}</p></div></div>
            @endforeach
            @else
            <p>Tidak ada kurikulum tertaut.</p>
            @endif
        </div>
        <div class="col-md-6 m-0 p-0">
            <h5>Dosen :</h5>
            @if($mk->dosen->isNotEmpty())
            @foreach($mk->dosen as $x)
            <div class="d-flex align-items-center mb-2">
                <div class="d-flex justify-content-center align-items-center overflow-hidden rounded shadow-m-2" style="width:30px; aspect-ratio:3/4;">
                    <img src="{{ asset($x->dosen_foto) }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="ms-3">
                    <p class="m-0 fsz-11 text-secondary">{{ $x->dosen_nomor }}</p>
                    <p class="m-0"><a href="{{ url('admin-dosen/' . $x->dosen_id) }}" class="text-clr1 td-hover">{{ $x->dosen_nama }}</a></p>
                </div>
            </div>
            @endforeach
            @else
            <p class="m-0">Tidak ada dosen pengajar untuk mata kuliah ini.</p>
            @endif
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-clr1" id="modalAturDosen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAturDosenLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalAturDosenLabel">Atur Dosen</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if($dosen->isNotEmpty())
            @foreach($dosen as $x)
            <div class="card border-clr1 m-0 text-clr3">
                <h5>{{ $x->dosen_nama }}</h5>
            </div>
            @endforeach
            @else
            <p class="m-0">Data dosen belum tersedia. <a href="{{ url('admin-dosen') }}" class="td-none">Tambah di sini.</a></p>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="{{ url('admin-hapus-matkul/' . $mk->mk_id) }}" class="btn btn-danger">Hapus</a>
        </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-clr1" id="modalDel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalDelLabel">Hapus</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Apakah Anda yakin ingin menghapus mata kuliah ini?
            <h5 class="m-0 fw-bold">{{ $mk->mk_id }}</h5>
            <h5 class="m-0 fw-bold">{{ $mk->mk_mk_ID }}</h5>
            <p class="m-0 text-secondary">{{ $mk->mk_mk_EN }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="{{ url('admin-hapus-matkul/' . $mk->mk_id) }}" class="btn btn-danger">Hapus</a>
        </div>
        </div>
    </div>
</div>